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
Route::get('/custom/login', 'FrontController@loginUser')->name('multilogin');
Route::get('/login/admin', 'Auth\loginUserController@adminLoginForm')->name('adminLogin');
Route::post('/login/admin', 'Auth\loginUserController@adminLogin');
Route::get('/login/dosen', 'Auth\loginUserController@dosenLoginForm')->name('dosenLogin');
Route::post('/login/dosen', 'Auth\loginUserController@dosenLogin');
Route::get('/login/mahasiswa', 'Auth\loginUserController@mahasiswaLoginForm')->name('mahasiswaLogin');
Route::post('/login/mahasiswa', 'Auth\loginUserController@mahasiswaLogin');
Route::post('/logout/pengguna', 'Auth\loginUserController@logout')->name('logoutPengguna');

Auth::routes();

Route::get('/front', 'FrontController@index');

Route::group(
    ['namespace' => 'Admin', 'middleware' => ['cekTipe', 'admin'], 'prefix' => 'admin'],
    function () {
        Route::get('dashboard', 'DashboardController@index')->name('adminDashboard');
        Route::get('profile', 'DashboardController@profileAdmin')->name('adminProfile');
        Route::resource('prodi', 'ProdiController');
        Route::resource('topik', 'ProdiTopikController');
        Route::resource('konsentrasi', 'ProdiKonsentrasiController');
        Route::resource('crud', 'UserAdminController');
        Route::resource('nilai', 'NilaiController');
        Route::resource('dosencrud', 'UserDosenController');
        Route::resource('mahasiswacrud', 'UserMahasiswaController');
        Route::resource('angkatan', 'AngkatanController');
        Route::post('daftaradmin', 'RegisterController@registrasiAdmin');
        Route::get('register', 'RegisterController@register')->name('dosenRegister');
        Route::post('daftardosen', 'RegisterController@registrasiDosen');
    }
);

Route::group(
    ['namespace' => 'Dosen', 'middleware' => ['cekTipe', 'dosen'], 'prefix' => 'dosen'],
    function () {
        Route::get('dashboard', 'DosenController@index')->name('dosenDashboard');
    }
);

Route::group(
    ['namespace' => 'Mahasiswa', 'middleware' => ['cekTipe', 'mahasiswa'], 'prefix' => 'mahasiswa'],
    function () {
        Route::get('dashboard', 'MahasiswaController@index')->name('mahasiswaDashboard');
    }
);



Route::get('/home', 'HomeController@index')->name('home');


//not used anymore

