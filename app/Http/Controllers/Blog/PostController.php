<?php

namespace GJames\Http\Controllers\Blog;

use GJames\Post;
use ShortcodeHelpers;
use Illuminate\Http\Request;
use GJames\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::published()->simplePaginate(10);

        return view('blog.posts.index', compact('posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \GJames\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $current_category = $post->category;

        return view('blog.posts.show', compact('post', 'current_category'));
    }
}
