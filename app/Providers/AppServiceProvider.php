<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\FooterContent;
use App\Models\FooterLinks;
use App\Models\settings;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       app()->bind('headerCats', function(){
         $data = Category::all();
         return $data;
      });

      app()->bind('settings', function(){
        $data = settings::find(1);
        return $data;
     });

      app()->bind('footerContents', function(){
        $data = FooterContent::find(1);
        return $data;
     });

     app()->bind('footerLinks', function(){
       $data = FooterLinks::all();
       return $data;
    });



    }
}
