@extends('layouts.painel')

@section('titulo', 'Balancete')
@section('titulo_painel', 'Balancete')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-6 col-xs-12">
            @include('balancete.pesquisa')
        </div>
        @if(isset($balancete) && isset($tipo) && 'sintetico' === $tipo)
            @can('balancete.sintetico')
            <div class="col-md-12 col-sm-6 col-xs-12">
                @include('balancete.sintetico')
            </div>
            @endcan
        @endif
        @if(isset($balancete) && isset($tipo) && 'analitico' === $tipo)
            @can('balancete.analitico')
            <div class="col-md-12 col-sm-6 col-xs-12">
                @include('balancete.analitico', compact('balancete'))
            </div>
            @endcan
        @endif
    </div>
@endsection
