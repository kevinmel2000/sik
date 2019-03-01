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
Auth::routes();

Route::group(['prefix'=>'admin', 'middleware' => ['auth','admin']], function () {
    
    Route::get('/', 'Admin\DashboardController@index');


    //level
    Route::get('kerjasama', 'Admin\KerjasamaController@index');
   
    Route::get('kerjasama/create', 'Admin\KerjasamaController@create');
    Route::post('kerjasama/store', 'Admin\KerjasamaController@store');
    Route::get('kerjasama/edit/{id}', 'Admin\KerjasamaController@edit');
    Route::post('kerjasama/edit', 'Admin\KerjasamaController@update');
    Route::delete('kerjasama/{id}', 'Admin\KerjasamaController@destroy');
    Route::get('kerjasama/download/{id}', 'Admin\KerjasamaController@download');
     Route::get('kerjasama/cari', 'Admin\KerjasamaController@cari');
      Route::get('kerjasama/akan_berakhir', 'Admin\KerjasamaController@akan_berakhir');
       Route::get('kerjasama/berakhir', 'Admin\KerjasamaController@berakhir');
       Route::get('kerjasama/aktif', 'Admin\KerjasamaController@aktif');

    //route user
    Route::get('perjanjian', 'Admin\PerjanjianController@index');
   
    Route::get('perjanjian/create', 'Admin\PerjanjianController@create');
    Route::post('perjanjian/store', 'Admin\PerjanjianController@store');
    Route::get('perjanjian/edit/{id}', 'Admin\PerjanjianController@edit');
    Route::post('perjanjian/edit', 'Admin\PerjanjianController@update');
    Route::delete('perjanjian/{id}', 'Admin\PerjanjianController@destroy');
     Route::get('perjanjian/download/{id}', 'Admin\PerjanjianController@download');
     Route::get('perjanjian/cari', 'Admin\PerjanjianController@cari');


       Route::get('mitra', 'Admin\MitraController@index');
   
    Route::get('mitra/create', 'Admin\MitraController@create');
    Route::post('mitra/store', 'Admin\MitraController@store');
    Route::get('mitra/edit/{id}', 'Admin\MitraController@edit');
    Route::post('mitra/edit', 'Admin\MitraController@update');
    Route::delete('mitra/{id}', 'Admin\MitraController@destroy');
     // Route::get('mitra/download/{id}', 'Admin\MitraController@download');
     // Route::get('mitra/cari', 'Admin\MitraController@cari');


  Route::get('panduan', 'Admin\PanduanController@index');
    Route::get('panduan/download/{id}', 'Admin\PanduanController@download');
 Route::get('panduan/create', 'Admin\PanduanController@create');
   Route::post('panduan/store', 'Admin\PanduanController@store');
    Route::get('panduan/tambah', 'Admin\PanduanController@tambah');
   Route::post('panduan/stores', 'Admin\PanduanController@stores');
     Route::get('panduan/edit/{id}', 'Admin\PanduanController@edit');
    Route::post('panduan/edit', 'Admin\PanduanController@update');
     Route::get('panduan/downloads/{id}', 'Admin\PanduanController@downloads');

     Route::get('kontak', 'Admin\KontakController@index');
  
 Route::get('panduan/create', 'Admin\KontakController@create');
   Route::post('panduan/store', 'Admin\KontakController@store');
     Route::get('panduan/edit/{id}', 'Admin\KontakController@edit');
    Route::post('panduan/edit', 'Admin\KontakController@update');
    

 

});