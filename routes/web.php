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
Route::get('/laravel', function () {
    return view('welcome');
});

// Route::get('/', function () {
//     return view('admin.dashboard.index');
// });

// route addition

Route::group(
    ['namespace' => 'Admin', 'prefix' => 'admin'],
    function () {
        Route::get('dashboard', 'DashboardController@index');
        Route::get('register', 'RegisterController@index');
    }
);

Route::group(
    ['namespace' => 'Dosen', 'prefix' => 'dosen'],
    function () {
        Route::get('dashboard', 'DashboardController@index');
        Route::get('register', 'RegisterController@index');
        Route::post('registerpost', 'RegisterController@postregis');
    }
);

Route::group(
    ['namespace' => 'Mahasiswa', 'prefix' => 'mahasiswa'],
    function () {
        Route::get('dashboard', 'DashboardController@index');
        Route::get('register', 'RegisterController@index');
    }
);

//Landing
Route::get('/', function () {
    return view('landing.landing');
});
