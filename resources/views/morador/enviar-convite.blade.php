@extends('layouts.painel')

@section('titulo', 'Moradores')
@section('titulo_painel', 'Convidar morador')

@section('content')
    @include('morador.formulario-cadastro')
@endsection
