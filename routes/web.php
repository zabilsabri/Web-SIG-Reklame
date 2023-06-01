<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['prefix' => '', 'namespace' => 'App\Http\Controllers\Auth'], function () {

    Route::get('', 'LoginController@index')->name('login');
    // Route::post('/loginProcess', 'LoginController@authenticate')->name('login.post');
    // Route::get('/logout', 'LoginController@logout')->name('logout');

});

Route::group(['prefix' => '', 'namespace' => 'App\Http\Controllers\Admin'], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', 'HomeController@index')->name('home.admin');

        Route::group(['prefix' => 'penyewaan-reklame'], function () {
            Route::get('/', 'SewaReklameController@index')->name('reklame.admin');
            Route::get('/edit', 'SewaReklameController@edit')->name('reklame-edit.admin');
        });

        Route::group(['prefix' => 'kelola-akun'], function () {
            Route::get('/', 'AkunController@index')->name('akun.admin');
            Route::get('/detail', 'AkunController@detail')->name('akun-detail.admin');
            Route::get('/edit', 'AkunController@edit')->name('akun-edit.admin');
        });

    });
});

Route::group(['prefix' => '', 'namespace' => 'App\Http\Controllers\User'], function () {
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', 'HomeController@index')->name('home.user');
        Route::get('/bantuan', 'HomeController@bantuan')->name('bantuan.user');

        Route::group(['prefix' => 'Info-Reklame'], function () {
            Route::get('/', 'ReklameController@index')->name('reklame.user');
        });

    });

});


Route::group(['prefix' => '', 'namespace' => 'App\Http\Controllers\Pimpinan'], function () {
    Route::group(['prefix' => 'pimpinan'], function () {
        Route::get('/', 'HomeController@index')->name('home.pimpinan');

        Route::group(['prefix' => 'Monitor-Reklame'], function () {
            Route::get('/', 'MonitorController@index')->name('monitor.pimpinan');
            Route::get('/detail', 'MonitorController@detail')->name('monitor-detail.pimpinan');
        });

    });

});
