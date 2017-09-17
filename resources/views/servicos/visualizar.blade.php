@extends('layouts.painel')

@section('titulo', 'Serviços')
@section('titulo_painel', 'Serviço #'. $servico->getId())

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Serviço</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <h4>Titulo: <small>{{ $servico->titulo }}</small></h4>
                    <h4>Descrição: <small>{{ $servico->descricao }}</small></h4>
                    <h4>Valor: <small>{{ $servico->valor_formatado }}</small></h4>
                    <h4>Data: <small>{{ $servico->data->format('d/m/Y') }}</small></h4>
                    <h4>Prestador de Serviço: <small>{{ $servico->prestador_servico->nome }}</small></h4>
                </div>
            </div>
        </div>
    </div>
@endsection
