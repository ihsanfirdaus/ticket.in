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
// Route::get('/page-loader',function(){
//     return view('layouts/custom');
// });
// FRONT-END
Route::group(['prefix' => '/'], function () {
    Route::get('/','Frontend\FrontendController@home');
    Route::group(['prefix' => '/','middleware' => 'auth'], function() {
        Route::get('info-tiket-pesawat','Frontend\FrontendController@info_tiket_pesawat');
        Route::get('info-tiket-bus','Frontend\FrontendController@info_tiket_bus');
        Route::get('pesan-tiket/isi-data','Frontend\FrontendController@isi_data');
        Route::get('pesan-tiket/review-pemesanan','Frontend\FrontendController@review_pemesanan');
        Route::get('pesan-tiket/metode-pembayaran','Frontend\FrontendController@metode_pembayaran');
        Route::get('pesan-tiket/konfirmasi-pembayaran-indomaret','Frontend\FrontendController@k_pembayaran_in');

    });
});


Route::get('/example', function() {
    return view('custom');
});

// BACK-END
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    // Route::get('/dashboard','@index');
    Route::resource('dashboard', 'Backend\DashboardController');
    // USER GROUP
    Route::group(['prefix' => 'user'], function () {
        Route::get('/','Backend\UserController@index');
        Route::get('delete/{id}', [
            'uses' => 'Backend\UserController@destroy',
            'as'   => 'user.destroy',
        ]);
    });
    // KENDARAAN GROUP
    Route::group(['prefix' => 'kendaraan'], function () {
        Route::get('/','Backend\KendaraanController@index');
        Route::post('save',[
            'uses' => 'Backend\KendaraanController@store',
            'as' => 'kendaraan.store'
        ]);
        Route::get('delete/{id}', [
            'uses' => 'Backend\KendaraanController@destroy',
            'as'   => 'kendaraan.destroy',
        ]);
    });
    Route::resource('kendaraan', 'Backend\KendaraanController');
    // JURUSAN GROUP
    Route::group(['prefix' => 'jurusan'], function () {
        Route::get('/','Backend\JurusanController@index');
        Route::post('save',[
            'uses' => 'Backend\JurusanController@store',
            'as' => 'jurusan.store'
        ]);
        Route::get('delete/{id}', [
            'uses' => 'Backend\JurusanController@destroy',
            'as'   => 'jurusan.destroy',
        ]);
    });
    Route::resource('jurusan', 'Backend\JurusanController');
    // JADWAL GROUP
    Route::group(['prefix' => 'jadwal'], function () {
        Route::get('/','Backend\JadwalController@index');
        Route::post('save',[
            'uses' => 'Backend\JadwalController@store',
            'as' => 'jadwal.store'
        ]);
        Route::get('delete/{id}', [
            'uses' => 'Backend\JadwalController@destroy',
            'as'   => 'jadwal.destroy',
        ]);
    });
    Route::resource('jadwal', 'Backend\JadwalController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

