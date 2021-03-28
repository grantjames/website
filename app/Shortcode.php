<?php

namespace GJames;

use Illuminate\Database\Eloquent\Model;
use Route;

class Shortcode extends Model
{
    protected $fillable = [
        'shortcode',
        'content'
    ];

    public $timestamps = false;
}
