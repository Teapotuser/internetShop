<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers;
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

Route::get('category/{code}', 'App\Http\Controllers\CategoryController@show')->name('category.show');     
Route::get('collection/{code}', 'App\Http\Controllers\CollectionController@show')->name('collection.show');    

Route::get('product/{article}', 'App\Http\Controllers\ProductController@show')->name('product.show');
/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/dashboard', function () {
    return view('dashboard');
})/* ->middleware(['auth', 'verified']) */->name('dashboard');

Route::get('/search', function () {
    return view('search');
})/* ->middleware(['auth', 'verified']) */->name('search.results');

/* Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php'; */

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
