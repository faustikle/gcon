@extends('layouts.painel')

@section('titulo', 'Painel')
@section('titulo_painel', 'Painel '. Auth::user()->funcao)

@section('content')
<div class="col-md-8 col-sm-8 col-xs-12">
</div>
@endsection
