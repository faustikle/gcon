<?php

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => ['auth'], 'prefix' => 'painel'], function() {
    Route::get('/', 'PainelController@index')->name('painel.index');

    Route::get('/reunioes', 'ReuniaoController@index')->name('reuniao.index');
    Route::get('/reuniao/{reuniao}', 'ReuniaoController@visualizar')->name('reuniao.visualizar');
});

