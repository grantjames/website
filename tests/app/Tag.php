<?php

namespace GJames;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $timestamps = false;
    
    public function posts()
    {
        return $this->belongsToMany('GJames\Post');
    }

    public function delete()
    {
        $this->posts()->detach();

        return parent::delete();
    }
}
