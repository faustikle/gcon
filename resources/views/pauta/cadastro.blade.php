@extends('layouts.painel')

@section('titulo', 'Pauta')
@section('titulo_painel', isset($pauta) ? 'Editar Pauta' : 'Nova Pauta')

@section('content')
    @include('pauta.formulario-cadastro', [
        'reuniao' => $reuniao,
        'pauta' => isset($pauta) ? $pauta : null
    ])
@endsection
