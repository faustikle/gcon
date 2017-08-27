@extends('layouts.painel')

@section('titulo', 'Ocorrências')
@section('titulo_painel', 'Ocorrências')

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-6 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Lista de Ocorrências</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Titulo</th>
                        @unless(Auth::user()->isMorador())
                            <th>Reclamente</th>
                        @endunless
                        <th>Reclamado</th>
                        @unless(Auth::user()->isMorador())
                            <th>Condomínio</th>
                        @endunless
                        <th>Situação</th>
                        <th>Data</th>
                        @unless(Auth::user()->isMorador())
                            <th>Ações</th>
                        @endunless
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($ocorrencias as $ocorrencia)
                            <tr>
                                <td><a data-toggle="modal" data-target="#modal-pauta-{{ $ocorrencia->getId() }}" href="">{{ $ocorrencia->titulo }}</a></td>
                                @unless(Auth::user()->isMorador())
                                    <td>{{ $ocorrencia->usuario->nome }}</td>
                                @endunless
                                <td>{{ $ocorrencia->reclamada }}</td>
                                @unless(Auth::user()->isMorador())
                                    <td>{{ $ocorrencia->condominio->nome }}</td>
                                @endunless
                                <td>{{ $ocorrencia->situacao }}</td>
                                <td>{{ $ocorrencia->created_at->format('d/m/Y') }}</td>
                                @unless(Auth::user()->isMorador())
                                    <td>
                                        @unless($ocorrencia->resolvido)
                                            <form action="{{ route('ocorrencia.resolver', $ocorrencia->getId()) }}" method="POST">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-md btn-success"><i class="fa fa-gavel"></i> Resolver</button>
                                            </form>
                                        @endunless
                                    </td>
                                @endunless
                            </tr>

                            @include('ocorrencia.modal-view', compact('ocorrencia'))
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
