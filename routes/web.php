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

/*
* Begin Page Controllers 
*/
Route::get('/', 'PageController@home')->name('home');
Route::get('/login','PageController@login')->name('login');
Route::get('/logout','VendorController@logout')->name('logout');
Route::get('/unauthorized','PageController@unauthorized')->name('unauthorized');
 

/*
* Product Controllers
*/
Route::get('/product/{slug}', 'ProductController@index');
Route::get('/vendor/{slug}', 'ProductController@vendor');
Route::get('/category/{cat_slug}/{brand_slug}', 'ProductController@category');

/*
* Vendor Controller
*/
Route::post('/createvendor', 'VendorController@store')->name('createvendor');
Route::post('/login', 'VendorController@index')->name('newlogin');


/*
* Admin Routes
*/ 
Route::middleware(['auth','admin'])->group( function(){
	Route::get('/dashboard','PageController@admin_dashboard');
	Route::get('/vendors','VendorController@admin_vendors');
	Route::get('/update_vendor/{vendor}/{id}','VendorController@admin_vendor_update');
	Route::get('/delete_vendor/{vendor}','VendorController@admin_vendor_delete');
	Route::get('/category','CategoryController@admin_category');
	Route::get('/delete_category/{category}','CategoryController@admin_category_delete');
	Route::get('/delete_brand/{brand}','CategoryController@admin_brand_delete');
	Route::post('/add_category','CategoryController@store')->name('newcategory');
	Route::get('/products','PageController@admin_products');
	Route::get('/update_product/{product}/{id}','ProductController@admin_product_update');
	Route::get('/delete_product/{product}','ProductController@admin_product_delete');
});



