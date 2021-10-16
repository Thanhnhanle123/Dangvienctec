<?php

use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/', 'loginController@index');
    Route::post('/', 'loginController@login')->name('login');
});
Route::get('/', 'loginController@logout')->name('logout');
Route::middleware('auth')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', 'trangchuController@index')->name('trangchu');
        Route::prefix('/')->group(function () {
            Route::post('Ai', 'AiController@index')->name('sent_AI');
        });
        Route::prefix('dantoc')->group(function () {
            Route::get('/', 'dantocController@index')->name('dantoc.danhsach');
            Route::post('store', 'dantocController@store')->name('dantoc.store');
            Route::get('edit/{id}', 'dantocController@edit')->name('dantoc.edit');
            Route::post('update/{id}', 'dantocController@update')->name('dantoc.update');
            Route::get('delete/{id}', 'dantocController@delete')->name('dantoc.delete');
            Route::post('upload', 'dantocController@upload')->name('dantoc.upload');
        });

        Route::prefix('tongiao')->group(function () {
            Route::get('/', 'tongiaoController@index')->name('tongiao.danhsach');
            Route::post('store', 'tongiaoController@store')->name('tongiao.store');
            Route::get('edit/{id}', 'tongiaoController@edit')->name('tongiao.edit');
            Route::post('update/{id}', 'tongiaoController@update')->name('tongiao.update');
            Route::get('delete/{id}', 'tongiaoController@delete')->name('tongiao.delete');
            Route::post('upload', 'tongiaoController@upload')->name('tongiao.upload');
        });

        Route::prefix('trinhdovanhoa')->group(function () {
            Route::get('/','trinhdovanhoaController@index')->name('trinhdovanhoa.danhsach');
            Route::post('store','trinhdovanhoaController@store')->name('trinhdovanhoa.store');
            Route::get('edit/{id}','trinhdovanhoaController@edit')->name('trinhdovanhoa.edit');
            Route::post('update/{id}', 'trinhdovanhoaController@update')->name('trinhdovanhoa.update');
            Route::get('delete/{id}', 'trinhdovanhoaController@delete')->name('trinhdovanhoa.delete');
        });

        Route::prefix('ngoaingu')->group(function () {
            Route::get('/', 'ngoainguController@index')->name('ngoaingu.danhsach');
            Route::post('store', 'ngoainguController@store')->name('ngoaingu.store');
            Route::get('edit/{id}', 'ngoainguController@edit')->name('ngoaingu.edit');
            Route::post('update/{id}', 'ngoainguController@update')->name('ngoaingu.update');
            Route::get('delete/{id}', 'ngoainguController@delete')->name('ngoaingu.delete');
        });

        Route::prefix('tinhoc')->group(function () {
            Route::get('/', 'tinhocController@index')->name('tinhoc.danhsach');
            Route::post('store', 'tinhocController@store')->name('tinhoc.store');
            Route::get('edit/{id}', 'tinhocController@edit')->name('tinhoc.edit');
            Route::post('update/{id}', 'tinhocController@update')->name('tinhoc.update');
            Route::get('delete/{id}', 'tinhocController@delete')->name('tinhoc.delete');
        });

        Route::prefix('chucvu')->group(function () {
            Route::get('/', 'chucvuController@index')->name('chucvu.danhsach');
            Route::post('store', 'chucvuController@store')->name('chucvu.store');
            Route::get('edit/{id}', 'chucvuController@edit')->name('chucvu.edit');
            Route::post('update/{id}', 'chucvuController@update')->name('chucvu.update');
            Route::get('delete/{id}', 'chucvuController@delete')->name('chucvu.delete');
        });

        Route::prefix('thanhpho')->group(function () {
            Route::get('/', 'thanhphoController@index')->name('thanhpho.danhsach');
            Route::post('store', 'thanhphoController@store')->name('thanhpho.store');
            Route::get('edit/{id}', 'thanhphoController@edit')->name('thanhpho.edit');
            Route::get('delete/{id}', 'thanhphoController@delete')->name('thanhpho.delete');
            Route::post('update/{id}', 'thanhphoController@update')->name('thanhpho.update');
            Route::post('upload', 'thanhphoController@upload')->name('thanhpho.upload');
        });

        Route::prefix('chibo')->group(function () {
            Route::get('/', 'chiboController@index')->name('chibo.danhsach');
            Route::post('store', 'chiboController@store')->name('chibo.store');
            Route::get('edit/{id}', 'chiboController@edit')->name('chibo.edit');
            Route::get('delete/{id}', 'chiboController@delete')->name('chibo.delete');
            Route::post('update/{id}', 'chiboController@update')->name('chibo.update');
            Route::post('upload', 'chiboController@upload')->name('chibo.upload');
        });

        Route::prefix('dangvien')->group(function () {
            Route::get('/', 'dangvienController@index')->name('dangvien.danhsach');
            Route::get('create', 'dangvienController@create')->name('dangvien.create');
            Route::post('store', 'dangvienController@store')->name('dangvien.store');
            Route::get('edit/{id}', 'dangvienController@edit')->name('dangvien.edit');
            Route::get('delete/{id}', 'dangvienController@delete')->name('dangvien.delete');
            Route::post('update/{id}', 'dangvienController@update')->name('dangvien.update');
            Route::post('/', 'dangvienController@search')->name('dangvien.search');

            Route::prefix('dangvienchuyendi')->group(function () {
                Route::get('/', 'dangvienController@index_dangvienchuyendi')->name('dangvienchuyendi.danhsach');
                Route::get('create/{id}', 'dangvienController@create_dangvienchuyendi')->name('dangvienchuyendi.create');
                Route::post('store/{id}', 'dangvienController@store_dangvienchuyendi')->name('dangvienchuyendi.store');
            });

            Route::prefix('dangviendaxoa')->group(function () {
                Route::get('/', 'dangvienController@index_dangviendaxoa')->name('dangviendaxoa.danhsach');
                Route::get('undo/{id}', 'dangvienController@undo_dangviendaxoa')->name('dangviendaxoa.undo');
                Route::get('delete/{id}', 'dangvienController@delete_dangviendaxoa')->name('dangviendaxoa.delete');
            });
        });
        Route::prefix('quantrivien')->group(function () {
            Route::get('/', 'quantrivienController@index')->name('quantrivien.danhsach');
            Route::post('store', 'quantrivienController@store')->name('quantrivien.store');
            Route::get('edit/{id}', 'quantrivienController@edit')->name('quantrivien.edit');
            Route::post('update/{id}', 'quantrivienController@update')->name('quantrivien.update');
            Route::get('delete/{id}', 'quantrivienController@delete')->name('quantrivien.delete');
            Route::get('thongtincanhan/{id}', 'quantrivienController@edit')->name('quantrivien.info');
        });
    });
});

