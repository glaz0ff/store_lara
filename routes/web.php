<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Store\Admin\CategoryController;
use App\Http\Controllers\Store\Admin\ProductController;
use App\Http\Controllers\Store\ProductController as GuestProductController;
use App\Http\Controllers\Store\Admin\BuyController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'store'], function () {
    Route::resource('products', GuestProductController::class)->names('store.products');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

$groupData = [
    'prefix' => 'admin/store'
];
Route::group($groupData, function ()
{
    $methods = ['index', 'edit', 'store', 'update', 'create',];
    Route::resource('category', CategoryController::class)
        ->only($methods)
        ->names('store.admin.category');
    Route::resource('product', ProductController::class)
        ->only($methods)
        ->names('store.admin.product');
    Route::resource('buys', BuyController::class)
        ->only($methods)
        ->names('store.admin.buys');
});
