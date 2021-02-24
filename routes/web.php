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

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/login', 'LoginController@login')->name('login');
Route::get('/logout', 'LoginController@logout')->name('logout');

Route::get('/adminview', 'AdminController@index')->name('adminview');
Route::get('/admininput', 'Admincontroller@admininput')->name('admininput');
Route::get('/adminedit/{id}', 'AdminController@adminedit')->name('adminedit');
Route::post('/adminupdate', 'AdminController@adminupdate')->name('adminupdate');
Route::get('/admindelete/{id}', 'AdminController@admindelete')->name(('admindelete'));

Route::get('/book', 'BukuController@index')->name('buku');
Route::post('/bukusave', 'BukuController@bukusave')->name('bukusave');
Route::get('/bukuedit/{id}', 'BukuController@bukuedit')->name('bukuedit');
Route::post('/bukuupdate', 'BukuController@bukuupdate')->name('bukuupdate');
Route::get('/bukudelete/{id}', 'BukuController@bukudelete')->name('bukudelete');

Route::get('/pinjam', 'PinjamController@index')->name('pinjam');
Route::post('/pinjamsave', 'PinjamController@pinjamsave')->name('pinjamsave');
Route::get('/pinjamedit/{id}', 'PinjamController@pinjamedit')->name('pinjamedit');
Route::post('/pinjamupdate', 'PinjamController@pinjamupdate')->name('pinjamupdate');
Route::get('/pinjamdelete/{id}', 'PinjamController@pinjamdelete')->name('pinjamdelete');