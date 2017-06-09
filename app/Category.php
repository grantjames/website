<?php

namespace GJames;

use Illuminate\Database\Eloquent\Model;
use GJames\Exceptions\CategoryNotEmptyException;

class Category extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'colour',
        'sort_order'
    ];
    
    public function posts()
    {
        return $this->hasMany('GJames\Post');
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }

    // This is accessible via $this->darker_colour
    public function getDarkerColourAttribute()
    {
        $rgb = "#";
        $luminance = -0.5;
        for($i = 0; $i < 3; $i++) {
            $c = hexdec(substr(substr($this->colour, 1), $i * 2, 2));
            $c = dechex(round(min(max(0, $c + ($c * $luminance)), 255)));
            $rgb .= substr(("00" . $c), strlen($c));
        }

        return $rgb;
    }

    public function delete()
    {
        if ($this->posts()->exists()) {
            throw new CategoryNotEmptyException("This category is not empty and so can\'t be deleted");
        }

        return parent::delete();
    }
}
