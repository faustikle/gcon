@extends('layouts.painel')

@section('titulo', 'Serviços')
@section('titulo_painel', 'Serviços')

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-6 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Lista de serviços</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="datatable" class="table table-striped table-bordered bulk_action">
                    <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Valor</th>
                        <th>Data</th>
                        <th>Realizado</th>
                        <th>Prestador</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($servicos as $servico)
                            <tr>
                                <td><a href="{{ route('servicos.visualizar', $servico->getId()) }}">{{ $servico->titulo }}</a></td>
                                <td>{{ $servico->valor_formatado }}</td>
                                <td>{{ $servico->data->format('d/m/Y') }}</td>
                                <td class="text-center">
                                    @if($servico->realizado)
                                        <h3 class="text-success"><i class="fa fa-check"></i></h3>
                                    @else
                                        <h3 class="text-warning"><i class="fa fa-clock-o"></i></h3>
                                    @endif
                                </td>
                                <td>{{ $servico->prestador_servico->nome }}</td>
                                <td style="display: inline-flex;width: 100%">
                                @can('servicos.editar')
                                    <a
                                            href="{{ route('servicos.editar', $servico->getId()) }}"
                                            class="btn btn-md btn-info">
                                        <i class="fa fa-pencil-square-o"></i>
                                    </a>
                                @endcan
                                @can('servicos.excluir')
                                    <form action="{{ route('servicos.excluir', $servico->getId()) }}" method="POST">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-md btn-danger"><i class="fa fa-trash-o"></i></button>
                                    </form>
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
