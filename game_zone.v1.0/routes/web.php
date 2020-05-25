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

Route::get('/', function () {
    return view('welcome');
});

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
Route::get('/profile', 'UserController@show');


//Product
Route::get('/producto', 'ProductController@show');
Route::post('/crear_producto', 'ProductController@createProduct');
Route::get('/ver_producto/{token}', 'ProductController@examinateProduct');
Route::get('/modificar_producto/{token}', 'ProductController@examinateProduct');