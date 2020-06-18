<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'ProductController@show');

Route::get('/main', function () {
    return view('home');
});

Route::get('/layout', function () {
    return view('layouts.mainlayout');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

//My account
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/profiles', 'UserController@show');
Route::get('/profile', 'UserController@showAccount');
Route::post('/crear_usuario', 'UserController@createUser');
Route::get('/eliminar_user/{token}', 'UserController@changeStatus');
Route::get('/examinar_user/{token}', 'UserController@examinateUser');
Route::post('/actualizar_user', 'UserController@updateUser');

//Product
Route::get('/producto', 'ProductController@show');
Route::post('/crear_producto', 'ProductController@createProduct');
Route::get('/ver_producto/{token}', 'ProductController@examinateProduct');
Route::post('/modificar_producto', 'ProductController@updateProduct');
Route::get('/eliminar_product/{token}', 'ProductController@changeStatus');
Route::post('/buscar_producto', 'ProductController@showAjax');
Route::post('/buscar_juego', 'ProductController@juegosxNombre');
Route::get('/buscar/{plataforma}', 'ProductController@juegosxPlataforma');

//Order
Route::get('/carrito', 'OrderController@showCart');
Route::get('/agregar_carrito/{token}', 'OrderController@addCart');
Route::post('/realizar_pedido', 'OrderController@preOrder');
Route::post('/confirmar_pedido', 'OrderController@order');
Route::get('/pedidos', 'OrderController@showOrders');