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


Route::view('/','login');
Route::view('signup','signup');
Route::view('welcome','welcome');
Route::view('daftarHewan','daftarHewan');
Route::view('adopsi','adopsi');
Route::view('donasi','donasi');
