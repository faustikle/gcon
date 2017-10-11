@extends('layouts.painel')

@section('titulo', 'Prestadores de Serviço')
@section('titulo_painel', 'Prestador: '. $prestador->nome   )

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Dados do Prestador</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <h4>
                        Avaliação média: @include('components.rate', [
                            'total' => $prestador->media_avaliacoes_arredondado,
                            'readOnly' => 'true',

                    ])
                    </h4>
                    <h4>Nome: <small>{{ $prestador->nome }}</small></h4>
                    <h4>Cpf: <small>{{ $prestador->cpf }}</small></h4>
                    <h4>CNPJ: <small>{{ $prestador->cnpj }}</small></h4>
                    <h4>Responsavel: <small>{{ $prestador->responsavel }}</small></h4>
                    <h4>Telefone: <small>{{ $prestador->telefone }}</small></h4>
                    <h4>Celular: <small>{{ $prestador->celular }}</small></h4>
                    <h4>Endereco: <small>{{ $prestador->endereco }}</small></h4>
                    <h4>Numero: <small>{{ $prestador->numero }}</small></h4>
                    <h4>Bairro: <small>{{ $prestador->bairro }}</small></h4>
                    <h4>Cidade: <small>{{ $prestador->cidade->nome }}</small></h4>
                    <h4>CEP: <small>{{ $prestador->cep }}</small></h4>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Áreas de atuação</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable" class="table table-striped table-b ordered bulk_action">
                        <thead>
                        <tr>
                            <th>Área de Atuação</th>
                            <th>Avaliações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($prestador->categorias as $categoria)
                            <tr>
                                <td>{{ $categoria->categoria_prestador->descricao }}</td>
                                <td>
                                    @include('components.rate', [
                                        'readOnly' => false,
                                        'total' => $categoria->media_avaliacoes_arredondado
                                    ])
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
