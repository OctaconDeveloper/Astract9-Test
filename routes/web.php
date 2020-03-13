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

Route::get('/', 'PageController@home');
Route::get('/product/{slug}', 'ProductController@index');
Route::get('/vendor/{slug}', 'ProductController@vendor');
Route::get('/category/{cat_slug}/{brand_slug}', 'ProductController@category');

