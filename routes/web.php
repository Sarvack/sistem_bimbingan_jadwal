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

Route::get('/front', 'FrontController@index');
Route::get('/custom/login', 'FrontController@loginUser')->name('multilogin');
Route::get('/login/pengguna', 'Auth\loginUserController@showLoginForm');
Route::post('/login/pengguna', 'Auth\loginUserController@UserLogin');
Route::get('/logout/pengguna', 'Auth\loginUserController@logout');

Route::get('/admin', function() {
  return view('admin');
})->middleware('auth:pengguna');

Route::get('/dosen', function() {
  return view('dosens.dashboard');
})->middleware('auth:pengguna');


Route::group(
    ['namespace' => 'Admin', 'prefix' => 'admin'],
    function () {
        Route::get('dashboard', 'DashboardController@index');
        Route::resource('prodi', 'ProdiController');
        Route::resource('topik', 'ProdiTopikController');
        Route::get('register', 'RegisterController@register')->name('adminRegister');
        Route::post('daftaradmin', 'RegisterController@registrasiAdmin');
    }
);

Route::group(
    ['namespace' => 'Dosen', 'prefix' => 'dosen'],
    function () {
        Route::get('register', 'RegisterController@register')->name('dosenRegister');
        Route::post('daftardosen', 'RegisterController@registrasiDosen');
    }
);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
