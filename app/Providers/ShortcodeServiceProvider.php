<?php

namespace GJames\Providers;
use Illuminate\Support\ServiceProvider;

class ShortcodeServiceProvider extends ServiceProvider
{
    public function register()
    {
        \App::bind('shortcode_helpers', function()
        {
            return new \GJames\Helpers\ShortcodeHelpers;
        });
    }
}
