@extends('layouts.painel')

@section('titulo', 'Fluxo de Caixa')
@section('titulo_painel', 'Fluxo de Caixa')

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-6 col-xs-12 iniciar-fluxo">
        <button type="button" class="btn btn-success">Iniciar Mês</button>
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Lançamentos</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form action="">
                    <div class="form-group col-lg-4 col-sm-4 col-xs-12">
                        <label for="tipo">Tipo*</label>
                        <select class="form-control" name="tipo" id="tipo">
                            <option value="1">Despesa</option>
                            <option value="2">Receita</option>
                        </select>
                    </div>
                    <div class="form-group col-lg-8 col-sm-8 col-xs-12">
                        <label for="categoria">Categoria*</label>
                        <select class="form-control" name="categoria" id="categoria">
                            <option value="1">Taxa de condominio</option>
                            <option value="2">Material de escritório</option>
                        </select>
                    </div>
                    <div class="form-group col-lg-12 col-xs-12">
                        <label for="descricao">Descrição*</label>
                        <input type="text" class="form-control" id="descricao">
                    </div>
                    <div class="form-group col-lg-6 col-xs-12">
                        <label for="data">Data*</label>
                        <input type="text" class="form-control" id="data">
                    </div>
                    <div class="form-group col-lg-6 col-xs-12">
                        <label for="valor">Valor*</label>
                        <input type="text" class="form-control" id="valor">
                    </div>
                    <div class="form-group col-lg-12 col-xs-12">
                        <label for="valor">Observação</label>
                        <input type="text" class="form-control" id="valor">
                    </div>
                    <div class="form-group col-md-12 text-right">
                        <input style="margin-right: 0" type="submit" class="btn btn-success" value="Adicionar Lançamento">
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
                            <td>R$250,30</td>
                        </tr>
                        <tr>
                            <th>Total de entradas:</th>
                            <td>R$10,34</td>
                        </tr>
                        <tr>
                            <th>Total de saidas:</th>
                            <td>R$5,80</td>
                        </tr>
                        <tr>
                            <th>Saldo atual:</th>
                            <td>R$265,24</td>
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
                    <tr>
                        <td>Despesa</td>
                        <td>Taxa de Condominio</td>
                        <td>Condominio do AP 104</td>
                        <td>10/05/2018</td>
                        <td>R$150,50</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
