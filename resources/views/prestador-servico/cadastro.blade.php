@extends('layouts.painel')

@section('titulo', 'Prestador de Serviço')
@section('titulo_painel', isset($prestador) ? 'Editar Prestador de Serviço' : 'Novo Prestador de Serviço')

@section('content')
    @include('prestador-servico.formulario-cadastro', [
        'prestador' => isset($prestador) ? $prestador : null,
    ])
@endsection
