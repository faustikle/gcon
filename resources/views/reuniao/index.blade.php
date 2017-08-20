@extends('layouts.painel')

@section('titulo', 'Reunião')
@section('titulo_painel', 'Reuniões')

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-6 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Lista de reunioes</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Settings 1</a>
                            </li>
                            <li><a href="#">Settings 2</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Data Abertura</th>
                        <th>Data Encerramento</th>
                        <th>Situação</th>
                        <th>Condominio</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($reunioes as $reuniao)
                            <tr>
                                <td><a href="{{ route('reuniao.visualizar', $reuniao->reuniao_id) }}">{{ $reuniao->titulo }}</a></td>
                                <td>{{ $reuniao->data_abertura }}</td>
                                <td>{{ $reuniao->data_encerramento }}</td>
                                <td>{{ $reuniao->situacao }}</td>
                                <td>{{ $reuniao->condominio->nome }}</td>
                                <td style="display: inline-flex">
                                @can('reunioes.excluir')
                                    <form action="{{ route('reuniao.excluir', $reuniao->reuniao_id) }}" method="POST">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-md btn-danger"><i class="fa fa-trash-o"></i></button>
                                    </form>
                                @endcan
                                @can('reunioes.editar')
                                    <a
                                            href="{{ route('reuniao.editar', $reuniao->reuniao_id) }}"
                                            class="btn btn-md btn-info">
                                        <i class="fa fa-pencil-square-o"></i>
                                    </a>
                                @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
