<?php

use App\Http\Controllers\DetailSaleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\RaffleController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\WinnerController;
use App\Http\Controllers\EmailController;
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


Route::group(['middleware' => 'admin'], function(){
    Route::get('dashboard', function(){
        return view('administracion.home');
    })->name('dashboard');
    Route::get('dashboard/products', [ProductController::class, 'index_admi'])->name('products.index.admi');
    Route::get('dashboard/products/create', [ProductController::class, 'create_admi'])->name('products.create.admi');
    Route::post('dashboard/products/update', [ProductController::class, 'store_admi'])->name('products.store.admi');
    Route::get('dashboard/products/{id}/edit', [ProductController::class, 'edit_admi'])->name('products.edit.admi');
    Route::patch('dashboard/products/{product}', [ProductController::class, 'update_admi'])->name('products.update.admi');
    Route::get('dashboard/products/{id}/delete', [ProductController::class, 'delete_admi'])->name('products.delete.admi');
    Route::patch('dashboard/products/{id}/update', [ProductController::class, 'update_state'])->name('products.update_state');
    Route::patch('dashboard/users/{id}/update', [UserController::class, 'update_state'])->name('users.update_state');
    Route::patch('dashboard/raffles/{id}/update', [RaffleController::class, 'update_state'])->name('raffles.update_state');
    Route::get('dashboard/ventas/revision', [SaleController::class, 'rifas_admin'])->name('revision-rifas');
    Route::patch('dashboard/ventas/revision/{id}/confirmar', [SaleController::class, 'confirma_pago'])->name('confirma-pago');
    Route::patch('dashboard/ventas/revision/{id}/observar', [SaleController::class, 'observa_pago'])->name('observa-pago');
    Route::get('venta/{id}/mostrar', [SaleController::class, 'mostrar'])->name('sales.mostrar');
    Route::patch('dashboard/categories/{id}', [CategoryController::class, 'update_state'])->name('categories.update-state');
    Route::get('ticket/{id}/mostrar', [RaffleController::class, 'mostrar'])->name('raffles.mostrar');
});

Route::group(['middleware' => 'cliente'], function(){
    Route::get('mis-sorteos', [SaleController::class, 'mis_sorteos'])->name('mis-sorteos');
    Route::patch('actualizar-estado/{id}', [SaleController::class, 'state_update'])->name('actualizar-estado');
    Route::patch('consultar-cupon', [CouponController::class, 'consultar_cupon'])->name('consultar_cupon');

});

Route::get('/', [CategoryController::class, 'cliente_index'])->name('home');
Route::get('categoria/{category}', [ProductController::class, 'producto_categoria'])->name('producto_categoria');
Route::get('politicas', function(){
    return view('cliente.politicas');
})->name('politicas');



Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class);
Route::resource('raffles', RaffleController::class);
Route::resource('states', StateController::class);
Route::resource('roles', RolController::class);
Route::resource('users', UserController::class);
Route::resource('winners', WinnerController::class);
Route::resource('coupons', CouponController::class);
Route::resource('detail_sales', DetailSaleController::class);
Route::resource('sales', SaleController::class);
Route::resource('emails', EmailController::class);

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::get('/', function(){
//     return view('cliente.home');
// })->name('home');
