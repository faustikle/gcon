@extends('layouts.painel')

@section('titulo', 'Painel')
@section('titulo_painel', 'Painel '. Auth::user()->funcao)

@section('content')
@endsection
