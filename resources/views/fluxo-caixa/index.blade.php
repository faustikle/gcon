@extends('layouts.painel')

@section('titulo', 'Fluxo de Caixa')
@section('titulo_painel', 'Fluxo de Caixa')

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-6 col-xs-12 iniciar-fluxo">
        @if($fluxoCaixaAtual)
        <form action="{{ route('fluxo-caixa.fechar') }}" method="POST">
            {{ csrf_field() }}
            <button type="submit" class="btn btn-warning">Fechar Mês</button>
        </form>
        @else
        <a data-toggle="modal" data-target="#modal-iniciar" class="btn btn-success" href="">Iniciar Mês</a>
        @endif
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
        @include('fluxo-caixa.form-lancamento', compact('fluxoCaixaAtual'))
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
        @include('fluxo-caixa.extrato-simples', compact('fluxoCaixaAtual'))
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        @include('fluxo-caixa.lista-lancamentos', compact('fluxoCaixaAtual'))
    </div>
</div>
    @include('fluxo-caixa.modal-inicar')
@endsection
