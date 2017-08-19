<?php

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => ['auth'], 'prefix' => 'painel'], function() {
    Route::get('/', 'PainelController@index')->name('painel.index');

    Route::get('/reunioes', 'ReuniaoController@index')->name('reuniao.index');
    Route::get('/reuniao/nova', 'ReuniaoController@cadastrar')->name('reuniao.cadastrar');
    Route::get('/reuniao/{reuniao}', 'ReuniaoController@visualizar')->name('reuniao.visualizar');

    Route::post('/pauta/{pauta}/votar/sim', 'VotoController@votarAFavor')->name('voto.aFavor');
    Route::post('/pauta/{pauta}/votar/nao', 'VotoController@votarContra')->name('voto.contra');
});

