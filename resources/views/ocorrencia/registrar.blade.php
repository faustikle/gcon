@extends('layouts.painel')

@section('titulo', 'Ocorrência')
@section('titulo_painel', 'Nova Ocorrência')

@section('content')
    @include('ocorrencia.formulario-cadastro')
@endsection
