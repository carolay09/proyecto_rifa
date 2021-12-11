<?php

use App\Http\Controllers\DetailSaleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RaffleController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolController;
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
Route::get('dashboard/products/{id}/delete', [ProductController::class, 'delete_admi'])->name('products.delete.admi');
Route::get('mis-rifas', [SaleController::class, 'mis_rifas'])->name('mis-rifas');
Route::patch('actualizar-estado/{id}', [SaleController::class, 'state_update'])->name('actualizar-estado');
Route::get('venta/{id}/mostrar', [SaleController::class, 'mostrar'])->name('sales.mostrar');
Route::get('dashboard/ventas/revision', [SaleController::class, 'rifas_admin'])->name('revision-rifas');
Route::patch('dashboard/ventas/revision/{id}/confirmar', [SaleController::class, 'confirma_pago'])->name('confirma-pago');
Route::patch('dashboard/ventas/revision/{id}/observar', [SaleController::class, 'observa_pago'])->name('observa-pago');
Route::resource('products', ProductController::class);


Route::resource('categories', CategoryController::class);
Route::resource('raffles', RaffleController::class);
Route::resource('states', StateController::class);
Route::resource('roles', RolController::class);
Route::resource('users', UserController::class);



Route::resource('detail_sales', DetailSaleController::class);
Route::resource('sales', SaleController::class);





Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('dashboard', function(){
    return view('administracion.home');
})->name('dashboard');
Route::get('/', function(){
    return view('cliente.home');
})->name('home');
