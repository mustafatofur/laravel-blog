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

Route::get('/kategori/{cat_id}-{category_slug}', [HomeController::class, 'category'])->name('category');
Route::get('/{id}-{slug}', [HomeController::class, 'singlePost'])->name('single');
Route::get('/click/{link_md5}', [HomeController::class, 'clickLink'])->name('link');
Route::match(['get','post'], '/search/{searchterm?}', [HomeController::class, 'search'])->name('search');
Route::get('/tag/{slug}', [HomeController::class, 'tags'])->name('tags');
Route::match(['get','post'],'/iletisim', [HomeController::class, 'contact'])->name('contact');


// header



// <-- admin paneli -->


Route::prefix('panel')->middleware('auth')->group(function(){
    Route::get('', [AdminController\GeneralController::class, 'settings'])->name('settings');
    Route::get('settings', [AdminController\GeneralController::class, 'settings'])->name('settings');
    Route::post('settingsUpdate', [AdminController\GeneralController::class, 'update'])->name('settingsUpdate');
    Route::match(['get','post'], 'changepassword', [AdminController\GeneralController::class, 'AdminSettings'])->name('changepassword');

    // Footer Area
    Route::match(['get','post'], 'footerEdit', [AdminController\GeneralController::class, 'FooterContent'])->name('footerEdit');
    Route::match(['get','post'], 'footerLinks', [AdminController\GeneralController::class, 'FooterLinks'])->name('footerLinks');
    Route::match(['get','post'], 'messages', [AdminController\GeneralController::class, 'messages'])->name('messages');
    Route::match(['get','post'], 'messages/view/{id}', [AdminController\GeneralController::class, 'messagesView'])->name('messagesView');
    Route::match(['get','post'], 'messages/delete/{id}', [AdminController\GeneralController::class, 'messagesDelete'])->name('messagesDelete');

    // Posts

    Route::prefix('posts')->group(function(){
        Route::get('', [AdminController\PostController::class, 'index'])->name('posts');
        Route::get('AddPost', [AdminController\PostController::class, 'create'])->name('postAdd');
        Route::post('AddPost_', [AdminController\PostController::class, 'store'])->name('postAdd2');
        Route::post('postUpdate/{id}', [AdminController\PostController::class, 'update'])->name('postUpdate');
        Route::get('edit/{id}', [AdminController\PostController::class, 'edit'])->name('postEdit');
        Route::get('delete/{id}', [AdminController\PostController::class, 'destroy'])->name('postdelete');

        // Active-Passive Post
        Route::post('activepassive/', [AdminController\PostController::class, 'activepassive'])->name('activepassive');
        Route::post('activepassive/{id}', [AdminController\PostController::class, 'activepassive'])->name('activepassive2');
        // // Active-Passive Post
    });

    // Categories
    Route::prefix('categories')->group(function(){
        Route::get('', [AdminController\GeneralController::class, 'categories'])->name('categories');
        Route::match(['get', 'post'],'add', [AdminController\GeneralController::class, 'categoriesadd'])->name('catAdd');
        Route::match(['get', 'post'],'edit/{cat_id}', [AdminController\GeneralController::class, 'categoriesedit'])->name('catEdit');
        Route::get('delete/{id}', [AdminController\GeneralController::class, 'categoriesdelete'])->name('catDelete');
    });

});
