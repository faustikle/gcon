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
        <form action="{{ route('fluxo-caixa.iniciar') }}" method="POST">
            {{ csrf_field() }}
            <button type="submit" class="btn btn-success">Iniciar Mês</button>
        </form>
        @endif
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Lançamentos</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form action="">
                    {{ csrf_field() }}
                    <div class="form-group col-lg-4 col-sm-4 col-xs-12">
                        <label for="tipo">Tipo*</label>
                        <select class="form-control" name="tipo" id="tipo" {{ $fluxoCaixaAtual ? '' : 'disabled'  }}>
                            @if($fluxoCaixaAtual)
                            <option value="1">Despesa</option>
                            <option value="2">Receita</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group col-lg-8 col-sm-8 col-xs-12">
                        <label for="categoria">Categoria*</label>
                        <select class="form-control" name="categoria" id="categoria" {{ $fluxoCaixaAtual ? '' : 'disabled'  }}>
                            @if($fluxoCaixaAtual)
                            <option value="1">Taxa de condominio</option>
                            <option value="2">Material de escritório</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group col-lg-12 col-xs-12">
                        <label for="descricao">Descrição*</label>
                        <input type="text" class="form-control" id="descricao" {{ $fluxoCaixaAtual ? '' : 'disabled'  }}>
                    </div>
                    <div class="form-group col-lg-6 col-xs-12">
                        <label for="data">Data*</label>
                        <input type="text" class="form-control" id="data" {{ $fluxoCaixaAtual ? '' : 'disabled'  }}>
                    </div>
                    <div class="form-group col-lg-6 col-xs-12">
                        <label for="valor">Valor*</label>
                        <input type="text" class="form-control" id="valor" {{ $fluxoCaixaAtual ? '' : 'disabled'  }}>
                    </div>
                    <div class="form-group col-lg-12 col-xs-12">
                        <label for="valor">Observação</label>
                        <input type="text" class="form-control" id="valor" {{ $fluxoCaixaAtual ? '' : 'disabled'  }}>
                    </div>
                    <div class="form-group col-md-12 text-right">
                        <input style="margin-right: 0" type="submit" class="btn btn-success" value="Adicionar Lançamento" {{ $fluxoCaixaAtual ? '' : 'disabled'  }}>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Extrato Simples</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                        <tr>
                            <th style="width:50%">Saldo inicial:</th>
                            <td>{{ $fluxoCaixaAtual ? $fluxoCaixaAtual->saldo_inicial : 'R$ 0,00' }}</td>
                        </tr>
                        <tr>
                            <th>Total de entradas:</th>
                            <td>{{ $fluxoCaixaAtual ? $fluxoCaixaAtual->total_entradas : 'R$ 0,00' }}</td>
                        </tr>
                        <tr>
                            <th>Total de saidas:</th>
                            <td>{{ $fluxoCaixaAtual ? $fluxoCaixaAtual->total_saidas : 'R$ 0,00' }}</td>
                        </tr>
                        <tr>
                            <th>Saldo atual:</th>
                            <td>{{ $fluxoCaixaAtual ? $fluxoCaixaAtual->saldo_atual : 'R$ 0,00' }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Lista de Lançamentos</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                @if($fluxoCaixaAtual && $fluxoCaixaAtual->possuiLancamentos())
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th style="width: 15%">Tipo</th>
                            <th style="width: 15%">Categoria</th>
                            <th style="width: 40%">Descrição</th>
                            <th style="width: 15%">Data</th>
                            <th style="width: 15%">Valor</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($fluxoCaixaAtual->lancamentos as $lancamento)
                            <tr>
                                <td>{{ $lancamento->tipo }}</td>
                                <td>{{ $lancamento->categoria->descricao }}</td>
                                <td>{{ $lancamento->descricao }}</td>
                                <td>{{ $lancamento->created_at->format('d/m/Y') }}</td>
                                <td>{{ $lancamento->valor }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="text-center">
                        Sem lançamentos.
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
