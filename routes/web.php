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

// route default laravel
// Route::get('/', function () {
//     return view('welcome');
// });

// route addition

// Route::get('/', 'HomeController@index');
Route::get('/front', 'FrontController@index');
Route::get('/custom/login', 'FrontController@loginUser')->name('multilogin');


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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
