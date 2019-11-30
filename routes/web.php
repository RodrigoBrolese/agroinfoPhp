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

Route::get('/register', 'LoginController@create')->name('register');
Route::post('/store', 'LoginController@store')->name('storeUser');

Route::post('/login', 'LoginController@login')->name('login');
Route::get('/logout', 'LoginController@logout')->name('logout');

Route::get('/dashbord', 'DashbordController@index')->name('dashbord')->middleware('auth');
