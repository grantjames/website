<?php

namespace GJames\Http\Controllers\Blog;

use GJames\Tag;
use Illuminate\Http\Request;
use GJames\Http\Controllers\Controller;

class TagController extends Controller
{
    /**
     * Display a listing of the posts with the specified tag.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        $posts = $tag->posts()->published()->simplePaginate(10);
        $tag = $tag->name;

        return view('blog.posts.index', compact('posts', 'tag'));
    }


}
