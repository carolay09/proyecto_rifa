<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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


