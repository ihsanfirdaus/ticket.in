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

// FRONT-END
Route::get('/', function () {
    return view('frontend/home');
});
Route::get('/info-jadwal', function () {
    return view('frontend/info');
});
Route::get('/pesan-tiket', function () {
    return view('frontend/pesan');
});

Route::get('/example-login', function() {
    return view('backend/login');
});

// BACK-END
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/dashboard','Backend\DashboardController@index');
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

    Route::get('/jadwal','Backend\JadwalController@index');
    Route::get('/booking','Backend\BookingController@index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

