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
        Route::get('info-tiket-pesawat','Frontend\FrontendController@info_tiket_pesawat')->name('cari_tiket');
        // Route::get('info-tiket-bus','Frontend\FrontendController@info_tiket_bus');
        Route::get('isi-data/{kode_jadwal}','Frontend\FrontendController@isi_data');
        Route::get('review-pemesanan','Frontend\FrontendController@review_pemesanan');
        Route::get('metode-pembayaran','Frontend\FrontendController@metode_pembayaran');
        Route::get('konfirmasi-pembayaran-indomaret','Frontend\FrontendController@k_pembayaran_in');
        Route::get('konfirmasi-pembayaran-bri','Frontend\FrontendController@k_pembayaran_bri');
        Route::get('konfirmasi-pembayaran-bca','Frontend\FrontendController@k_pembayaran_bca');
        Route::get('cetak-tiket','Frontend\FrontendController@cetak');
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
    // MASKAPAI GROUP
    Route::group(['prefix' => 'maskapai'], function () {
        Route::get('/','Backend\MaskapaiController@index');
        Route::post('save',[
            'uses' => 'Backend\MaskapaiController@store',
            'as' => 'maskapai.store'
        ]);
        Route::get('delete/{id}', [
            'uses' => 'Backend\MaskapaiController@destroy',
            'as'   => 'maskapai.destroy',
        ]);
    });
    Route::resource('maskapai', 'Backend\MaskapaiController');
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
    // PEMESANAN GROUP
    Route::group(['prefix' => 'pemesanan'], function () {
        Route::get('/','Backend\PemesananController@index');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

