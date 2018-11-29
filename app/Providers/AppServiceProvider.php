<?php

namespace App\Providers;

use App\Category;
use App\Product;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);

        view()->composer(['welcome', 'includes.navigation'], function ($view){
            $category = new Category();
            $categories = $category->tree();

            $products = Product::all();
            $view->with([
                'categories'=> $categories,
                'products'  => $products
                ]);
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
