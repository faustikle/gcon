@extends('layouts.painel')

@section('titulo', 'Moradores')
@section('titulo_painel', 'Moradores')

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-6 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Lista de Moradores</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Apartamento</th>
                        <th>Bloco</th>
                        <th>Função</th>
                        @unless(Auth::user()->isMorador())
                        <th>Ultimo Acesso</th>
                        @endunless
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($moradores as $morador)
                            <tr>
                                <td>{{ $morador->nome }}</td>
                                <td>{{ $morador->numero_apartamento }}</td>
                                <td>{{ $morador->bloco }}</td>
                                <td>{{ $morador->funcao }}</td>
                                @unless(Auth::user()->isMorador())
                                <td>{{ $morador->ultimo_acesso_formatado }}</td>
                                @endunless
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
