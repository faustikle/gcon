<?php

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => ['auth'], 'prefix' => 'painel'], function() {
    Route::get('/', 'PainelController@index')->name('painel.index');

    Route::get('/reunioes', 'ReuniaoController@index')
        ->name('reuniao.index')
        ->middleware('can:reunioes.listar');

    Route::get('/reuniao/nova', 'ReuniaoController@cadastrar')
        ->name('reuniao.cadastrar')
        ->middleware('can:reunioes.cadastro');

    Route::post('/reuniao/nova', 'ReuniaoController@salvar')
        ->name('reuniao.salvar')
        ->middleware('can:reunioes.cadastro');

    Route::post('/reuniao/{reuniao}/excluir', 'ReuniaoController@excluir')
        ->name('reuniao.excluir')
        ->middleware('can:reunioes.excluir');

    Route::get('/reuniao/{reuniao}', 'ReuniaoController@visualizar')
        ->name('reuniao.visualizar')
        ->middleware('can:reunioes.visualizar');

    Route::post('/pauta/{pauta}/votar/sim', 'VotoController@votarAFavor')
        ->name('voto.aFavor')
        ->middleware('can:votos.votar');

    Route::post('/pauta/{pauta}/votar/nao', 'VotoController@votarContra')
        ->name('voto.contra')
        ->middleware('can:votos.votar');
});

