<?php

use Illuminate\Support\Facades\Route;

Route::get('auth', 'AuthController@index')->name('auth');
Route::post('login', 'AuthController@do_login');
Route::post('register', 'AuthController@do_register');

Route::group(['middleware' => 'auth:web'], function () {
    Route::get('logout', 'AuthController@do_logout')->name('logout');
});
Route::group(['middleware' => 'auth:web','verified'], function () {
    Route::get('/', function(){
        return redirect()->route('home');
    });
    Route::get('home', 'HomeController@index')->name('home');

    Route::get('pengadopsi', 'AdopsiController@index_pengadopsi')->name('pengadopsi');
    Route::get('adopsi', 'AdopsiController@index')->name('adopsi');
    Route::post('index-adopsi', 'AdopsiController@index')->name('adopsi_index');
    Route::get('hewan/{donasi}/adopsi', 'AdopsiController@show');
    Route::post('adopsi/store', 'AdopsiController@store')->name('adopsi_store');
    Route::get('adopsi/{adopsi}/edit', 'AdopsiController@edit');

    Route::get('donasi', 'DonasiController@index')->name('donasi');

    Route::post('donasi/store', 'DonasiController@store')->name('donasi_store');

});
