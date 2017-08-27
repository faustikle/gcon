@extends('layouts.painel')

@section('titulo', 'Reunião')
@section('titulo_painel', isset($reuniao) ? 'Editar Reunião' : 'Nova Reunião')

@section('content')
    <form action="{{ route('reuniao.salvar') }}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="reuniao_id" value="{{ isset($reuniao) ? $reuniao->reuniao_id : '' }}">
        <div style="margin-bottom: 3%">
            <label>Título</label>
            <input
                    type="text"
                    class="form-control {{ $errors->has('titulo') ? 'parsley-error' : '' }}"
                    placeholder="Titulo da reunião"
                    value="{{ isset($reuniao) ? $reuniao->titulo : '' }}"
                    name="titulo">
            @if ($errors->has('titulo'))
                <ul class="parsley-errors-list filled" id="parsley-id-20"><li class="parsley-required">{{ $errors->first('titulo') }}</li></ul>
            @endif
        </div>
        <div style="margin-bottom: 3%">
            <label>Data de início</label>
            <input
                    type="date"
                    class="form-control {{ $errors->has('data_abertura') ? 'parsley-error' : '' }}"
                    name="data_abertura"
                    value="{{ isset($reuniao) ? $reuniao->data_abertura->format('Y-m-d') : '' }}"
                    required="">
            @if ($errors->has('data_abertura'))
                <ul class="parsley-errors-list filled" id="parsley-id-20"><li class="parsley-required">{{ $errors->first('data_abertura') }}</li></ul>
            @endif
        </div>
        <div style="margin-bottom: 3%">
            <label>Date de término</label>
            <input
                    type="date"
                    class="form-control {{ $errors->has('data_encerramento') ? 'parsley-error' : '' }}"
                    name="data_encerramento"
                    value="{{ isset($reuniao) ? $reuniao->data_encerramento->format('Y-m-d') : '' }}"
                    required="">
            @if ($errors->has('data_encerramento'))
                <ul class="parsley-errors-list filled" id="parsley-id-20"><li class="parsley-required">{{ $errors->first('data_encerramento') }}</li></ul>
            @endif
        </div>
        <div style="margin-bottom: 3%">
            <input class="btn btn-default submit" type="submit" value="{{ isset($reuniao) ? 'Salvar' : 'Cadastrar' }}">
            <a class="btn btn-default submit" href="{{ route('reuniao.index') }}">Voltar</a>
            @if(isset($reuniao))
            <a class="btn btn-info submit" href="{{ route('reuniao.index') }}">Adicionar Pauta</a>
            @endif
        </div>

        <div class="clearfix"></div>
    </form>
    @if(isset($reuniao))
    <div class="title_left">
        <h3>Pautas</h3>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th>Titulo</th>
            <th>Situação</th>
            @if ($reuniao->aberta)
                @can('votos.total')
                    <th>Votos</th>
                @endcan
            @endif
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($reuniao->pautas as $pauta)
            <tr>
                <td><a data-toggle="modal" data-target="#modal-pauta-{{ $pauta->pauta_id }}" href="">{{ $pauta->titulo }}</a></td>

                <td>{{ $pauta->situacao }}</td>
                @if ($reuniao->aberta)
                    @can('votos.total')
                        <td>{{ $pauta->total_votos }}</td>
                    @endcan
                @endif
                <td>
                    <div style="display: inline-flex">
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
                    </div>
                </td>
            </tr>
            <div id="modal-pauta-{{ $pauta->pauta_id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">Pauta #{{ $pauta->pauta_id }}</h4>
                        </div>
                        <div class="modal-body">
                            <h4>{{ $pauta->titulo }}</h4>
                            <p>{{ $pauta->descricao }}</p>
                            <hr>
                            <h5>Comentários</h5>
                            @if ($pauta->comentarios->isNotEmpty())
                                <ul class="messages">
                                    @foreach($pauta->comentarios as $comentario)
                                        <li>
                                            <div class="message_date">
                                                <h3 class="date text-info">{{ $comentario->created_at->format('d/m') }}</h3>
                                            </div>
                                            <div class="message_wrapper">
                                                <h4 class="heading">{{ $comentario->usuario->nome }}</h4>
                                                <blockquote class="message">{{ $comentario->descricao }}</blockquote>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p>Sem comentários.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </tbody>
    </table>
    @endif
@endsection
