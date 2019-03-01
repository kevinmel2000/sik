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

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('kerjasama', 'HomeController@kerjasama');
 Route::get('download/{id}', 'HomeController@download');
 Route::get('cari', 'HomeController@cari');
 Route::get('perjanjian', 'HomeController@perjanjian');
 Route::get('downloadd/{id}', 'HomeController@downloadd');
 Route::get('carii', 'HomeController@carii');
  Route::get('panduan', 'HomeController@panduan');
  Route::get('kontak', 'HomeController@kontak');
   Route::get('mitra', 'HomeController@mitra');
   Route::get('downloads/{id}', 'HomeController@downloads');
