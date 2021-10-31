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

Route::get('/index', 'MenuController@index');

Route::get('/showmenu', 'MenuManagementController@index');

Route::post('/create', 'MenuManagementController@create')->name('store');
Route::post('/update', 'MenuManagementController@update')->name('update');


