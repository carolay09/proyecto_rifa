<?php

use App\Http\Controllers\DetailSaleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
<<<<<<< HEAD
use App\Http\Controllers\CategoryController;
=======
use App\Http\Controllers\SaleController;
>>>>>>> f442f7dcc60aa5b19848222a85f60d88785d6b62
use Illuminate\Support\Facades\Auth;

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


Route::get('dashboard/products', [ProductController::class, 'index_admi'])->name('products.index.admi');
Route::get('dashboard/products/create', [ProductController::class, 'create_admi'])->name('products.create.admi');
Route::post('dashboard/products/update', [ProductController::class, 'store_admi'])->name('products.store.admi');
Route::get('dashboard/products/{id}/edit', [ProductController::class, 'edit_admi'])->name('products.edit.admi');
Route::patch('dashboard/products/{product}', [ProductController::class, 'update_admi'])->name('products.update.admi');
Route::resource('products', ProductController::class);
<<<<<<< HEAD

Route::resource('categories', CategoryController::class);

Route::get('/', function(){
    return view('welcome');
});
=======
Route::resource('detail_sales', DetailSaleController::class);
>>>>>>> f442f7dcc60aa5b19848222a85f60d88785d6b62



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
