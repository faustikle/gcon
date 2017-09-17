@extends('layouts.painel')

@section('titulo', 'Prestadores de Serviço')
@section('titulo_painel', 'Prestadores de Serviço')

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-6 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Lista de prestadores de serviço</h2>
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
                <table id="datatable" class="table table-striped table-b ordered bulk_action">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>Cidade</th>
                        <th>Áreas de Atuação</th>
                        <th>Avaliação</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($prestadores as $prestador)
                            <tr>
                                <td><a href="{{ route('prestadores.visualizar', $prestador->getId()) }}">{{ $prestador->nome }}</a></td>
                                <td>{{ $prestador->telefone }}</td>
                                <td>{{ $prestador->cidade->nome }}</td>
                                <td>{{ $prestador->categorias_nome }}</td>
                                <td>
                                    <div class="rateYo"
                                         data-rateyo-rating="{{ $prestador->media_avaliacoes_arredondado }}"
                                         data-rateyo-read-only="true"
                                         data-rateyo-max-value="{{ \App\Models\Servico\AvaliacaoPrestador::AVALIACAO_MAXIMA }}"
                                         data-rateyo-star-width="20px"></div>
                                </td>
                                <td style="display: inline-flex">
                                    @can('prestadores.excluir')
                                        <form action="{{ route('prestadores.excluir', $prestador->getId()) }}" method="POST">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-md btn-danger"><i class="fa fa-trash-o"></i></button>
                                        </form>
                                    @endcan
                                        @can('prestadores.editar')
                                            <a
                                                    href="{{ route('prestadores.editar', $prestador->getId()) }}"
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
