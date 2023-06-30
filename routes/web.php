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

    Route::get('/login', 'LoginController@index')->name('login');
    Route::post('/loginProcess', 'LoginController@authenticate')->name('login.post');

    Route::get('/email-recovery', 'LoginController@emailRecIndex')->name('email-recovery');
    Route::post('/email-recovery-process', 'LoginController@re_pass')->name('email-recovery.post');
    Route::get('/reset-password/{token}', 'LoginController@showResetPasswordForm')->name('reset-password.get');
    Route::post('/reset-password', 'LoginController@submitResetPasswordForm')->name('reset-password.post');
    
    Route::get('/logout', 'LoginController@logout')->name('logout');

});

Route::group(['prefix' => '', 'namespace' => 'App\Http\Controllers\Admin', 'middleware' => ['auth', 'HakAkses:Admin']], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', 'HomeController@index')->name('home.admin');

        Route::group(['prefix' => 'penyewaan-reklame'], function () {
            Route::get('/', 'SewaReklameController@index')->name('reklame.admin');
            Route::get('/json-modal/{id}', 'SewaReklameController@jsonModal')->name('reklame-modal-json.admin');
            Route::get('/json', 'SewaReklameController@json')->name('reklame-json.admin');
            Route::post('/add', 'SewaReklameController@store')->name('reklame-tambah.admin');
            Route::get('/edit/{id}', 'SewaReklameController@edit')->name('reklame-edit.admin');
            Route::put('/edit-process/{id}', 'SewaReklameController@editProcess')->name('reklame-edit-process.admin');
            Route::delete('/delete/{id}', 'SewaReklameController@destroy')->name('reklame-hapus.admin');
        });

        Route::group(['prefix' => 'data-reklame'], function () {
            Route::get('/', 'DataReklameController@index')->name('data-reklame.admin');
            Route::get('/json', 'DataReklameController@json')->name('data-reklame-json.admin');
            Route::get('/json-detail/{id}', 'DataReklameController@jsonDetail')->name('data-reklame-json-detail.admin');
            Route::post('/add', 'DataReklameController@store')->name('data-reklame-tambah.admin');
            Route::get('/edit/{id}', 'DataReklameController@edit')->name('data-reklame-edit.admin');
            Route::put('/edit-process/{id}', 'DataReklameController@editProcess')->name('data-reklame-edit-process.admin');
            Route::delete('/delete/{id}', 'DataReklameController@destroy')->name('data-reklame-hapus.admin');
        });

        Route::group(['prefix' => 'kelola-akun'], function () {

            //Lihat
            Route::get('/', 'AkunController@index')->name('akun.admin');
            Route::get('/json', 'AkunController@json')->name('akun-json.admin');
            Route::get('/detail/{id}', 'AkunController@detail')->name('akun-detail.admin');

            //Tambah
            Route::post('/add', 'AkunController@store')->name('akun-tambah.admin');

            //Hapus
            Route::delete('/delete/{id}', 'AkunController@destroy')->name('akun-hapus.admin');

            //Edit
            Route::get('/edit/{id}', 'AkunController@edit')->name('akun-edit.admin');
            Route::put('/process-edit/{id}', 'AkunController@editProcess')->name('akun-edit-process.admin');

        });

        Route::group(['prefix' => 'Laporan-Penyewaan'], function () {
            Route::get('/', 'LaporanController@index')->name('laporan.admin');
            Route::get('/detail', 'LaporanController@detail')->name('laporan-detail.admin');
        });

    });
});

Route::group(['prefix' => '', 'namespace' => 'App\Http\Controllers\User'], function () {
    Route::get('/', 'HomeController@index')->name('home.user');
        Route::get('/bantuan', 'HomeController@bantuan')->name('bantuan.user');

        Route::group(['prefix' => 'Info-Reklame'], function () {
            Route::get('/', 'ReklameController@index')->name('reklame.user');
        });
});


Route::group(['prefix' => '', 'namespace' => 'App\Http\Controllers\Pimpinan', 'middleware' => ['auth', 'HakAkses:Pimpinan']], function () {
    Route::group(['prefix' => 'pimpinan'], function () {
        Route::get('/', 'HomeController@index')->name('home.pimpinan');

        Route::group(['prefix' => 'Monitor-Reklame'], function () {
            Route::get('/', 'MonitorController@index')->name('monitor.pimpinan');
            Route::get('/detail/{id}', 'MonitorController@detail')->name('monitor-detail.pimpinan');
        });

        Route::group(['prefix' => 'Laporan-Penyewaan'], function () {
            Route::get('/', 'LaporanController@index')->name('laporan.pimpinan');
            Route::get('/detail', 'LaporanController@detail')->name('laporan-detail.pimpinan');
        });

    });

});
