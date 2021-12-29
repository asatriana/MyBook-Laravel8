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

// Route::get('/', function () {
    // return view('welcome');
// });
Route::get('books/export/', 'BooksController@export');
Route::get('users/export/', 'UserController@export');
Route::resource('books', 'BooksController');
Route::resource('users', 'UserController');
//Route::resource('search', 'UserController');
//Route search bisa sebagai berikut :
//1. Route::get('/search', [App\Http\Controllers\UserController::class, 'search'])->name('search');
//2. Route::get('/search', '\App\Http\Controllers\UserController@search')->name('search');
Route::get('/search', 'UserController@search')->name('search');

Route::get('/pegawai', 'PegawaiController@index');
Route::get('/pegawai/cetak_pdf', 'PegawaiController@cetak_pdf');
