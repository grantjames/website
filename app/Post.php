<?php

namespace GJames;

use Route;
use Cache;
use GJames\Tag;
use Carbon\Carbon;
use GJames\Category;
use ShortcodeHelpers;
use Illuminate\Database\Eloquent\Model;
use GrahamCampbell\Markdown\Facades\Markdown;

class Post extends Model
{
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'published_at'
    ];

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'body',
        'category_id',
        'published_at'
    ];

    const BODY_CACHE_STORE = 'post_body_html';

    public function category()
    {
        return $this->belongsTo('GJames\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('GJames\Tag');
    }

    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', Carbon::now())
                     ->whereNotNull('published_at')
                     ->orderBy('published_at', 'DESC');
    }

    public function scopeUnpublished($query)
    {
        return $query->where(function($query) {
            $query->where('published_at', '>', Carbon::now())
                  ->orWhereNull('published_at')
                  ->orderBy('published_at', 'DESC');
        });
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = strtolower($value);
    }

    public function getBodyCacheKey()
    {
        return "post_{$this->id}_body_cache";
    }

    public function getHTMLBody()
    {
        return Cache::store(self::BODY_CACHE_STORE)->rememberForever($this->getBodyCacheKey(), function () {
            return Markdown::convertToHtml(
                ShortcodeHelpers::ApplyShortcodes($this->body));
        });
    }

    public function bodyContainsCode()
    {
        return strpos($this->body, '```') !== false;
    }

    public function save(array $options = [])
    {
        Cache::forget($this->getBodyCacheKey());

        return parent::save($options);
    }
    
    public function delete()
    {
        //$this->tags()->detach();

        Cache::forget($this->getBodyCacheKey());

        return parent::delete();
    }
}
