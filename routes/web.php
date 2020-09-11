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

Route::group(
    ['namespace' => 'Dosen', 'middleware' => ['auth', 'cekTipe:Dosen'], 'prefix' => 'dosen'],
    function () {
        Route::get('dosenajah', 'DosenController@index')->name('dosenaja');
    }
);

Route::get('/front', 'FrontController@index');
Route::get('/custom/login', 'FrontController@loginUser')->name('multilogin');
Route::get('/login/admin', 'Auth\loginUserController@adminLoginForm')->name('adminLogin');
Route::post('/login/admin', 'Auth\loginUserController@adminLogin');
Route::get('/login/dosen', 'Auth\loginUserController@dosenLoginForm')->name('dosenLogin');
Route::post('/login/dosen', 'Auth\loginUserController@dosenLogin');
Route::get('/login/mahasiswa', 'Auth\loginUserController@mahasiswaLoginForm');
Route::post('/login/mahasiswa', 'Auth\loginUserController@mahasiswaLogin');
Route::get('/logout/pengguna', 'Auth\loginUserController@logout')->name('logoutPengguna');

Route::group(
    ['namespace' => 'Admin', 'middleware' => ['auth', 'cekTipe:Admin Prodi'], 'prefix' => 'admin'],
    function () {
        Route::get('dashboard', 'DashboardController@index')->name('adminDashboard');
        Route::resource('prodi', 'ProdiController');
        Route::resource('topik', 'ProdiTopikController');
        Route::resource('crud', 'UserAdminController');
        Route::post('daftaradmin', 'RegisterController@registrasiAdmin');
        Route::get('register', 'RegisterController@register')->name('dosenRegister');
        Route::post('daftardosen', 'RegisterController@registrasiDosen');
    }
);



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
