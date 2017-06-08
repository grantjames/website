<?php

namespace GJames\Http\Controllers\Blog;

use GJames\Category;
use Illuminate\Http\Request;
use GJames\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the posts in the category.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $posts = $category->posts()->published()->simplePaginate(10);
        $current_category = $category;

        return view('blog.posts.index', compact('posts', 'current_category'));
    }
}
