<?php
namespace App\Http\Controllers;

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::match(['get','post'],'panel/login', [LoginController::class, 'login'])->name('login');
Route::match(['get'],'panel/logout', [LoginController::class, 'login'])->name('logout');



Route::get('/',[HomeController::class, 'index'])->name('home');

Route::group(['controller' => HomeController::class], function(){
    Route::get('/category/{cat_id}-{category_slug}', 'category')->name('category');
    Route::get('/{id}-{slug}', 'singlePost')->name('single');
    Route::get('/click/{link_md5}', 'clickLink')->name('link');
    Route::match(['get','post'], '/search/{searchterm?}', 'search')->name('search');
    Route::get('/tag/{slug}', 'tags')->name('tags');
    Route::match(['get','post'],'/contact',  'contact')->name('contact');
});



// header



// <-- admin panel -->

Route::prefix('panel')->middleware('auth')->group(function(){
    Route::group(['controller' => AdminController\GeneralController::class], function(){
        Route::get('', 'settings')->name('settings');
        Route::get('settings', 'settings')->name('settings');
        Route::post('settingsUpdate', 'update')->name('settingsUpdate');
        Route::match(['get','post'], 'changepassword', 'AdminSettings')->name('changepassword');
    
        // Footer Area
        Route::match(['get','post'], 'footerEdit', 'FooterContent')->name('footerEdit');
        Route::match(['get','post'], 'footerLinks', 'FooterLinks')->name('footerLinks');
        Route::match(['get','post'], 'messages', 'messages')->name('messages');
        Route::match(['get','post'], 'messages/view/{id}', 'messagesView')->name('messagesView');
        Route::match(['get','post'], 'messages/delete/{id}', 'messagesDelete')->name('messagesDelete');
    });
   

    // Posts

    Route::prefix('posts')->group(function(){
       Route::group(['controller' => AdminController\PostController::class], function(){
        Route::get('', 'index')->name('posts');
        Route::get('AddPost', 'create')->name('postAdd');
        Route::post('AddPost_', 'store')->name('postAdd2');
        Route::post('postUpdate/{id}', 'update')->name('postUpdate');
        Route::get('edit/{id}', 'edit')->name('postEdit');
        Route::get('delete/{id}', 'destroy')->name('postdelete');

        // Active-Passive Post
        Route::post('activepassive/', 'activepassive')->name('activepassive');
        Route::post('activepassive/{id}', 'activepassive')->name('activepassive2');
        // // Active-Passive Post
       });
    });

    // Categories
    Route::prefix('categories')->group(function(){
        Route::group(['controller' => AdminController\GeneralController::class], function(){
            Route::get('', [AdminController\GeneralController::class, 'categories'])->name('categories');
            Route::match(['get', 'post'],'add', [AdminController\GeneralController::class, 'categoriesadd'])->name('catAdd');
            Route::match(['get', 'post'],'edit/{cat_id}', [AdminController\GeneralController::class, 'categoriesedit'])->name('catEdit');
            Route::get('delete/{id}', [AdminController\GeneralController::class, 'categoriesdelete'])->name('catDelete');
           });
    });

});
