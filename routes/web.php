<?php

//
// Blog routes
//

Route::group(['namespace' => 'Blog'], function() {
    Route::get('/',                          'PostController@index');

    // Posts
    Route::get('/blog',                      'PostController@index');
    Route::get('/blog/{post}',               'PostController@show');

    // Categories and tags
    // With name/slug
    Route::get('/category/{category_name}',  'CategoryController@show');
    //Route::get('/tag/{tag_name}',            'TagController@show');

    // With category ID
    Route::get('/categories/{category}',     'CategoryController@show');
    //Route::get('/tags/{tag}',                'TagController@show');
});

Route::get('/about', function() {
    return view('pages.about');
});

//
// Login routes
//

Route::get('login',                          'Auth\LoginController@showLoginForm')->name('login');
Route::post('login',                         'Auth\LoginController@login');
Route::post('logout',                        'Auth\LoginController@logout')->name('logout');

//
// Admin routes
//

Route::group([
        'middleware' => 'auth',
        'namespace'  => 'Admin',
        'prefix'     => env('APP_ADMIN_PREFIX', 'admin')
    ], function() {
        Route::get('/',                     'PostController@index');

        Route::resource('posts',            'PostController', ['as' => 'admin']);
        Route::resource('categories',       'CategoryController', ['as' => 'admin', 'except' => ['show']]);
        //Route::resource('tags',             'TagController', ['as' => 'admin', 'except' => ['show']]);
});

//
// Slug route for posts
//

Route::get('/{slug}',                     'Blog\PostController@show');