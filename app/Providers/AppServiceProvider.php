<?php

namespace GJames\Providers;

use GJames\Category;
use GJames\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Provide the tags list and the categories list to the side bar

        //
        // Change these queries to "having" posts
        //

        view()->composer('layouts.master', function ($view) {
            
            //
            // Categories for the lead paragraph (posts about...)
            //

            $lead_categories = Category::orderBy('sort_order')->get()->all();
            $categories_string = '';

            if (count($lead_categories) > 1) {
                $last_category = array_pop($lead_categories);

                $categories_string .= 'Posts about ';
                $categories_string .= implode(', ', array_map(function($category) {
                    return "<a href='/category/{$category->name}' style='color: {$category->colour}'>{$category->name}</a>";
                }, $lead_categories));

                $categories_string .= ' and other ' . "<a href='/category/{$last_category->name}' style='color: {$last_category->colour}'>{$last_category->name}</a> ramblings.";
            }

            $view->with('categories_string', $categories_string);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
