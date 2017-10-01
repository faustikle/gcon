@extends('layouts.painel')

@section('titulo', 'Documentos')
@section('titulo_painel', 'Novo Documento')

@section('content')
    @include('documento-condominio.formulario-cadastro')
@endsection
