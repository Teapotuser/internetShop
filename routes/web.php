<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\CollectionController;

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

Route::namespace('App\Http\Controllers\Main')->group(function () {
    Route::get('/', 'IndexController@index')->name('index');
    Route::get('/indexFilter', 'IndexController@indexFilter')->name('indexFilter');
    
    });

// Страница результатов поиска (нажатие кнопки Search)
Route::get('/find', 'App\Http\Controllers\SearchController@find')->name('search.find');
// Результаты поиска (ajax)
Route::get('/search', 'App\Http\Controllers\SearchController@search')->name('search.search');
    
Route::get('category/{category:code}', 'App\Http\Controllers\CategoryController@show')->name('category.show');     
Route::get('collection/{collection:code}', 'App\Http\Controllers\CollectionController@show')->name('collection.show');    

Route::get('product/{article}', 'App\Http\Controllers\ProductController@show')->name('product.show');
/* Route::get('/', function () {
    return view('welcome');
}); */
Route::get('/feedback', function () {return view('feedback');})->name('feedback.form');

Route::get('/dashboard', function () {
    return view('dashboard');
})/* ->middleware(['auth', 'verified']) */->name('dashboard');

/*Route::get('/search', function () {
    return view('search');
})/* ->middleware(['auth', 'verified']) ->name('search.results');

/* Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php'; */

Auth::routes();

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
    Route::get('/', function () {
        return view('admin.index');
    });
    Route::resource('category', 'App\Http\Controllers\Admin\CategoryController');
    Route::resource('collection', 'App\Http\Controllers\Admin\CollectionController');
    Route::resource('product', 'App\Http\Controllers\Admin\ProductController');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');