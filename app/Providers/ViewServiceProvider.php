<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\posts;
use App\Models\Category;

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
     *
     * @return void
     */
    public function boot()
    {
      // Using Closure based composers...
     View::composer('includes.header', function ($view) {
         $data = Category::all();

         $view->with([
             'cats ' => $data
         ]);
     });
    }
}
