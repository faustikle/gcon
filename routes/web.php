<?php

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => ['auth'], 'prefix' => 'painel'], function() {
    Route::get('/', 'PainelController@index')->name('painel.index');

    /**
     * REUNIÕES
     */
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

    Route::get('/reuniao/{reuniao}/editar', 'ReuniaoController@editar')
        ->name('reuniao.editar')
        ->middleware('can:reunioes.editar');

    Route::get('/reuniao/{reuniao}', 'ReuniaoController@visualizar')
        ->name('reuniao.visualizar')
        ->middleware('can:reunioes.visualizar');

    /**
     * PAUTAS
     */
    Route::get('/reuniao/{reuniao}/pauta/nova', 'PautaController@cadastrar')
        ->name('pauta.cadastrar')
        ->middleware('can:pautas.cadastro');

    Route::get('/reuniao/{reuniao}/pauta/{pauta}', 'PautaController@editar')
        ->name('pauta.editar')
        ->middleware('can:pautas.editar');

    Route::post('/reuniao/{reuniao}/pauta/nova', 'PautaController@salvar')
        ->name('pauta.salvar')
        ->middleware('can:pautas.cadastro');

    Route::post('/pauta/{pauta}/excluir', 'PautaController@excluir')
        ->name('pauta.excluir')
        ->middleware('can:pautas.excluir');

    Route::post('/pauta/{pauta}/votar/sim', 'VotoController@votarAFavor')
        ->name('voto.aFavor')
        ->middleware('can:votos.votar');

    Route::post('/pauta/{pauta}/votar/nao', 'VotoController@votarContra')
        ->name('voto.contra')
        ->middleware('can:votos.votar');

    /**
     * OCORRÊNCIAS
     */
    Route::get('/ocorrencias', 'OcorrenciaController@index')
        ->name('ocorrencia.index')
        ->middleware('can:ocorrencias.listar');

    Route::post('/ocorrencia/{ocorrencia}/resolver', 'OcorrenciaController@resolver')
        ->name('ocorrencia.resolver')
        ->middleware('can:ocorrencias.resolver');

    Route::get('/ocorrencia/nova', 'OcorrenciaController@registrar')
        ->name('ocorrencia.registrar')
        ->middleware('can:ocorrencias.registrar');

    Route::post('/ocorrencia/nova', 'OcorrenciaController@salvar')
        ->name('ocorrencia.salvar')
        ->middleware('can:ocorrencias.registrar');

    /**
     * PRESTADORES DE SERVIÇO
     */
    Route::get('/prestadores-servico', 'PrestadoresServicoController@index')
        ->name('prestadores.index')
        ->middleware('can:prestadores.listar');

    Route::get('/prestador-servico/{prestador}', 'PrestadoresServicoController@visualizar')
        ->name('prestadores.visualizar')
        ->middleware('can:prestadores.visualizar');

    Route::get('/prestadores-servico/novo', 'PrestadoresServicoController@cadastrar')
        ->name('prestadores.cadastrar')
        ->middleware('can:prestadores.cadastro');

    Route::post('/prestadores-servico/novo', 'PrestadoresServicoController@salvar')
        ->name('prestadores.salvar')
        ->middleware('can:prestadores.cadastro');

    Route::post('/prestador-servico/{prestador}/excluir', 'PrestadoresServicoController@excluir')
        ->name('prestadores.excluir')
        ->middleware('can:prestadores.excluir');

    Route::get('/prestador-servico/{prestador}/editar', 'PrestadoresServicoController@editar')
        ->name('prestadores.editar')
        ->middleware('can:prestadores.editar');

    /**
     * SERVICOS
     */
    Route::get('/servicos', 'ServicoController@index')
        ->name('servicos.index')
        ->middleware('can:servicos.listar');

    Route::get('/servico/{servico}', 'ServicoController@visualizar')
        ->name('servicos.visualizar')
        ->middleware('can:servicos.visualizar');

    Route::get('/servicos/novo', 'ServicoController@cadastrar')
        ->name('servicos.cadastrar')
        ->middleware('can:servicos.cadastro');

    Route::post('/servicos/novo', 'ServicoController@salvar')
        ->name('servicos.salvar')
        ->middleware('can:servicos.cadastro');

    Route::post('/servico/{servico}/excluir', 'ServicoController@excluir')
        ->name('servicos.excluir')
        ->middleware('can:servicos.excluir');

    Route::get('/servico/{servico}/editar', 'ServicoController@editar')
        ->name('servicos.editar')
        ->middleware('can:servicos.editar');

    Route::post('/servico/{servico}/comentar', 'ServicoController@comentar')
        ->name('servicos.comentar');

    /**
     * DOCUMENTOS
     */
    Route::get('/documento/{documento}', 'DocumentoController@download')
        ->name('documentos.download');

    Route::post('/documento/{documento}/excluir', 'DocumentoController@excluir')
        ->name('documentos.excluir');

    /**
     * DOCUMENTOS CONDOMINIO
     */
    Route::get('/documentos', 'DocumentoCondominioController@index')
        ->name('documentos-condominio.index')
        ->middleware('can:documentos-condominio.listar');

    Route::post('/documentos', 'DocumentoCondominioController@salvar')
        ->name('documentos-condominio.salvar')
        ->middleware('can:documentos-condominio.cadastro');

    Route::get('/documentos/novo', 'DocumentoCondominioController@cadastro')
        ->name('documentos-condominio.cadastro')
        ->middleware('can:documentos-condominio.cadastro');
});

