<?php

// use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
// use App\Http\Controllers\CollectionController;

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\CollectionController as AdminCollectionController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Main\IndexController;
use App\Http\Controllers\ProductController;
use \App\Http\Controllers\Api\CartController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FeedbackController;

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

Auth::routes();

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/indexFilter', [IndexController::class, 'indexFilter'])->name('indexFilter');

/* Route::namespace('App\Http\Controllers\Main')->group(function () {
    Route::get('/', 'IndexController@index')->name('index');
    Route::get('/indexFilter', 'IndexController@indexFilter')->name('indexFilter');    
    }); */

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

//работа с корзиной
Route::get('cart', [CartController::class, 'index'])->name('cart');
Route::post('checkout', [CartController::class, 'storeOrder'])->name('saveOrder');
Route::get('checkout', [CartController::class, 'checkout'])->name('checkout');

Route::get('addToCart/{id}/{quantity}', [CartController::class, 'addToCart']);
Route::get('updateProductInCart/{id}/{quantity}', [CartController::class, 'update']);
Route::get('getCart', [CartController::class, 'getCart']);
Route::get('removeFromCart/{id}', [CartController::class, 'remove']);
Route::get('clearCart', [CartController::class, 'clear']);

// Форма обратной связи
Route::get('/feedback', [FeedBackController::class, 'show'])->name('feedback.form');
Route::post('/feedback', [FeedBackController::class, 'save'])->name('feedback.post');

// Route::get('/profile', function () {return view('profile');})->name('profile.personal');
// Route::get('/profile-orders', function () {return view('profile-ordershistory');})->name('profile.ordershistory');

/* Route::get('/dashboard', function () {
    return view('dashboard');
}) *//* ->middleware(['auth', 'verified']) *//* ->name('dashboard'); */

/*Route::get('/search', function () {
    return view('search');
})/* ->middleware(['auth', 'verified']) ->name('search.results');

/* Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php'; */
/* require __DIR__.'/auth.php'; */
// Личный кабинет пользователя
Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
    Route::get('/update-password', [ProfileController::class, 'update_password_view'])->name('update-password.view');
    Route::patch('/update-password', [ProfileController::class, 'update_password'])->name('update-password.update');
    Route::patch('/userdata', [ProfileController::class, 'update'])->name('update');
    Route::get('/userdata', [ProfileController::class, 'userdata'])->name('userdata.show');
    Route::patch('/subscription', [ProfileController::class, 'subscription_update'])->name('subscription.update');
    Route::get('/subscription', [ProfileController::class, 'subscription'])->name('subscription.show');
    Route::get('/', [ProfileController::class, 'show'])->name('show');
    // Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
});


//админ панель
Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
// Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => ['auth', 'role:admin']], function () {    
    Route::get('/', function () {
        return view('admin.index');
    });
    Route::resource('category', 'App\Http\Controllers\Admin\CategoryController');
    Route::resource('collection', 'App\Http\Controllers\Admin\CollectionController');
    Route::resource('product', 'App\Http\Controllers\Admin\ProductController');
    Route::resource('user', 'App\Http\Controllers\Admin\UserController');
    Route::resource('order', 'App\Http\Controllers\Admin\OrderController');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
