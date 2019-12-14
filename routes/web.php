<?php

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

Route::get('/', 'LoginController@index')->middleware('checkLogin')->name('home');

Route::get('/register', 'RegisterController@index')->name('register')->middleware('checkLogin');
Route::post('/store', 'RegisterController@store')->name('storeUser');

Route::post('/login', 'LoginController@login')->name('login');
Route::get('/logout', 'LoginController@logout')->name('logout');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard')->middleware('auth');

Route::get('/products', 'ProductsController@index')->name('products')->middleware('auth');


Route::middleware(['authApi', 'ajax'])->group(
    static function () {
        Route::get('/products/get', 'ProductsController@get')->name('products.get');
        Route::post('/products', 'ProductsController@store')->name('products.store');
        Route::get('/products/{id}', 'ProductsController@show')->name('products.show');
        Route::patch('/products/{id}', 'ProductsController@update')->name('products.update');
        Route::delete('/products/{id}', 'ProductsController@delete')->name('products.delete');
    }
);
