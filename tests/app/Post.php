<?php

namespace GJames;

use Illuminate\Database\Eloquent\Model;
use GrahamCampbell\Markdown\Facades\Markdown;
use Carbon\Carbon;
use GJames\Category;
use GJames\Tag;
use Route;

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
        'body',
        'category_id',
        'published_at'
    ];

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


    public function bodyContainsCode()
    {
        return strpos($this->body, '```') !== false;
    }

    public function save(array $options = [])
    {
        $this->body_html = Markdown::convertToHtml($this->body);

        return parent::save();
    }

    public function delete()
    {
        $this->tags()->detach();

        return parent::delete();
    }
}
