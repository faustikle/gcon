@extends('layouts.painel')

@section('titulo', 'Documentos')
@section('titulo_painel', 'Documentos')

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-6 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Documentos do condominio</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="datatable" class="table table-striped table-bordered bulk_action">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Data Inclusão</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($documentos as $documento)
                            <tr>
                                <td>{{ $documento->nome }}</td>
                                <td>{{ $documento->descricao }}</td>
                                <td>{{ $documento->created_at->format('d/m/Y') }}</td>
                                <td style="display: inline-flex;width: 100%">
                                <a
                                        href="{{ route('documentos.download', $documento->getId()) }}"
                                        target="_blank"
                                        class="btn btn-md btn-success">
                                    <i class="fa fa-download"></i>
                                    </a>
                                @can('documentos.excluir')
                                    <form action="{{ route('documentos.excluir', $documento->getId()) }}" method="POST">
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
