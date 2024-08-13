<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *  Создание переменной $categories_parent для главного шаблона
     * Создание переменной $categories (с родителем для каждой категории), применяется везде
     * @return void
     */
    public function boot()
    {
        view()->composer(['*'], function ($view) {
            $view->with('categories_parent', Category::whereNull('parent_id')->get());
        });

        view()->composer(['*'], function ($view) {
            $view->with('categories', Category::with('parent')->get());
        });
    }
}
