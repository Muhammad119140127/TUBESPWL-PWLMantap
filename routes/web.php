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
    return view('index');
});

/*
|--------------------------------------------------------------------------
| Web User Routes
|--------------------------------------------------------------------------
*/
Route::get('/latest', 'UserController@latest')->name('latest');
Route::get('/about', 'UserController@about')->name('about');
Route::get('/product', 'UserController@product')->name('product');

// Filtering
Route::get('/product/tshirt', 'UserController@tshirt')->name('tshirt');
Route::get('/product/jersey', 'UserController@jersey')->name('jersey');
Route::get('/product/hoodie', 'UserController@hoodie')->name('hoodie');

Route::get('product/kuantitas', 'UserController@kuantitas')->name('kuantitas');
Route::get('product/terbaru', 'UserController@terbaru')->name('terbaru');
Route::get('product/terlama', 'UserController@terlama')->name('terlama');
Route::get('product/diskon', 'UserController@diskon')->name('diskon');

Route::post('product/cari', 'UserController@cari')->name('cari');
Route::post('product/max', 'UserController@max')->name('max');

Route::get('detail/{data}', 'UserController@detail')->name('detail');
/*
|End User
|--------------------------------------------------------------------------
*/

// Route::get('/index', 'AdminController@index')->name('index');

Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');
Route::get('/produk', 'AdminController@produk')->name('produk');
Route::get('/create', 'AdminController@create')->name('create');
Route::post('/create', 'AdminController@store')->name('store');

Route::get('/delete/{id}', 'AdminController@destroy')->name('delete');
