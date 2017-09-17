@extends('layouts.painel')

@section('titulo', 'Serviços')
@section('titulo_painel', isset($servico) ? 'Editar Serviço' : 'Novo Serviço')

@section('content')
    @include('servicos.formulario-cadastro', [
        'servico' => isset($servico) ? $servico : null,
    ])
@endsection
