<?php

namespace GJames\Http\Controllers\Admin;

use Cache;
use GJames\Post;
use GJames\Shortcode;
use Illuminate\Http\Request;
use GJames\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use GJames\Http\Requests\StoreShortcodeRequest;
use GJames\Http\Requests\UpdateShortcodeRequest;

class ShortcodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shortcodes = Shortcode::all();

        return view('admin.shortcodes.index', compact('shortcodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.shortcodes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShortcodeRequest $request)
    {
        Shortcode::create($request->all());

        Session::flash('message', 'New shortcode created');

        return redirect()->route('admin.shortcodes.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Shortcode $shortcode)
    {
        return view('admin.shortcodes.edit', compact('shortcode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShortcodeRequest $request, Shortcode $shortcode)
    {
        $shortcode->fill($request->all());
        $shortcode->save();

        Session::flash('message', 'Shortcode updated.');
        Cache::store(Post::BODY_CACHE_STORE)->flush();

        return redirect()->route('admin.shortcodes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shortcode $shortcode)
    {
        $shortcode->delete();

        Session::flash('message', 'Shortcode deleted.');
        Cache::store(Post::BODY_CACHE_STORE)->flush();

        return redirect()->route('admin.shortcodes.index');
    }
}
