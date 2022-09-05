<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MessageController;

use App\Http\Controllers\ProductoController;


USE App\Http\Controllers\CarritoController;

use App\Http\Controllers\SubscriptionController;
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


// rutas de inicio
Route::view('/','home')->name('home');
Route::view('/home','home')->name('home');
Route::view('/contacto','contacto')->name('contacto');


// rutas para el CRUD de productos
Route::get('productos.index',[ProductoController::class, 'index'])->name('productos.index');
Route::get('productos.show/{producto}', [ProductoController::class,'show'])->name('productos.show');

Route::get('productos.renderCreate', [ProductoController::class,'renderCreate'])->name('productos.renderCreate');
Route::post('productos.createRegistro', [ProductoController::class,'createRegistro'])->name('productos.createRegistro');

Route::get('productos.renderEditarRegistro/{producto}', [ProductoController::class,'renderEditarRegistro'])->name('productos.renderEditarRegistro');
Route::patch('productos.editarRegistro/{producto}', [ProductoController::class,'editarRegistro'])->name('productos.editarRegistro');

Route::delete('productos.eliminarRegistro/{producto}', [ProductoController::class,'eliminarRegistro'])->name('productos.eliminarRegistro');


// aqui la ruta para mostrar una cateogria individual de productos
Route::get('categorias/{categoria}',[CategoriaController::class,'show'])->name('categorias.show');


// rutas para la autenticacion

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ruta para el messageController que va a enviar el email
Route::post('contacto.sendEmail', [MessageController::class, 'sendEmail'])->name('contacto.sendEmail');

//rutas para el procesamiento de pagos


Route::post('/webhook', [WebhookController::class, 'handle'])->name('webhook');



// rutas para definir el carrito de compra mostrar, eliminar etc

Route::post('carrito/{producto}/{user}', [CarritoController::class, 'agregarCarrito'])->name('carrito');// ruta para actualizar


Route::get('carrito.mostrar', [CarritoController::class, 'mostrarCarrito'])->name('carrito.mostrar'); 

Route::delete('carrito.eliminar/{pedido}', [CarritoController::class, 'eliminarRegistro'])->name('carrito.eliminar');













