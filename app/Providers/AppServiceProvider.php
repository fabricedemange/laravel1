<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\{Category, Actor};

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        View::composer(['index', 'create', 'edit'], function ($view) {
            $view->with('categories', Category::all());
            $view->with('actors', Actor::all());
        });
    }
}
