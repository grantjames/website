<?php

namespace GJames\Http\Controllers\Admin;

use GJames\Category;
use GJames\Http\Controllers\Controller;
use GJames\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $published = Post::published()->simplePaginate(10);

        $unpublished = Post::unpublished()->get();

        return view('admin.posts.index', compact('published', 'unpublished'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'         => 'required',
            'slug'          => 'required|alpha_dash|unique:posts', // Create validator
            'excerpt'       => 'required',
            'body'          => 'required',
            'category_id'   => 'required',
            'published_at'  => 'date|nullable'
        ]);

        $post = new Post;
        $post->title = $request->title;
        $post->slug = strtolower($request->slug);
        $post->excerpt = $request->excerpt;
        $post->body = $request->body;
        $post->category_id = $request->category_id;
        $post->published_at = $request->published_at;
        $post->save();

        Session::flash('message', 'New post created');

        return redirect('/admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();

        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title'         => 'required',
            'slug'          => 'required|alpha_dash|unique:posts,slug' . $post->id, // Create validator
            'excerpt'       => 'required',
            'body'          => 'required',
            'category_id'   => 'required',
            'published_at'  => 'date|nullable'
        ]);

        $post->title = $request->title;
        $post->slug = strtolower($request->slug);
        $post->excerpt = $request->excerpt;
        $post->body = $request->body;
        $post->category_id = $request->category_id;
        $post->published_at = $request->published_at;
        $post->save();

        Session::flash('message', 'Post updated');

        return redirect('/admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        Session::flash('message', 'Post deleted.');

        return redirect('/admin/posts');
    }
}
