<?php

namespace GJames\Http\Controllers\Admin;

use GJames\Category;
use GJames\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));
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
            'name'      => 'required|unique:categories',
            'colour'    => 'required', // Create validator
            'sort_order'=> 'required|integer'
        ]);

        $category = new Category;
        $category->name = strtolower($request->name);
        $category->colour = $request->colour;
        $category->sort_order = $request->sort_order;
        $category->save();

        Session::flash('message', 'New category created');

        return redirect('/admin/categories');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name'      => 'required|unique:categories,name,' . $category->id,
            'colour'    => 'required', // Create validator
            'sort_order'=> 'required|integer'
        ]);

        $category->name = strtolower($request->name);
        $category->colour = $request->colour;
        $category->sort_order = $request->sort_order;
        $category->save();

        Session::flash('message', 'Category updated.');

        return redirect('/admin/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        Session::flash('message', 'Category deleted.');

        return redirect('/admin/categories');
    }
}
