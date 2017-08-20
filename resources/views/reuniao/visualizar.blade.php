@extends('layouts.painel')

@section('titulo', 'Reuniões')
@section('titulo_painel', 'Reunião #'. $reuniao->reuniao_id)

@section('content')
    <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Reunião</h2>
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
                    <h4>Titulo: <small>{{ $reuniao->titulo }}</small></h4>
                    <h4>Data Abertura: <small>{{ $reuniao->data_abertura }}</small></h4>
                    <h4>Data Encerramento: <small>{{ $reuniao->data_encerramento }}</small></h4>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Pautas</h2>
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
                            <th>Situação</th>
                            @if ($reuniao->aberta)
                                @can('votos.total')
                                    <th>Votos</th>
                                @endcan
                                <th>Votar</th>
                            @endif
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
                                    <td>
                                        @unless (Auth::user()->jaVotou($pauta))
                                            <a
                                                    data-toggle="modal" data-target="#modal-voto-sim-pauta-{{ $pauta->pauta_id }}"
                                                    href=""
                                                    class="btn btn-md btn-primary"><i class="fa fa-thumbs-o-up"></i>
                                            </a>
                                            <a
                                                    data-toggle="modal" data-target="#modal-voto-nao-pauta-{{ $pauta->pauta_id }}"
                                                    href=""
                                                    class="btn btn-md btn-danger"><i class="fa fa-thumbs-o-down"></i>
                                            </a>
                                        @else
                                                Votada!
                                        @endunless
                                    </td>
                                @endif
                            </tr>

                            <div id="modal-voto-sim-pauta-{{ $pauta->pauta_id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <form action="{{ route('voto.aFavor', $pauta->pauta_id) }}" method="POST">
                                            {{ csrf_field() }}
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                                </button>
                                                <h4 class="modal-title">Pauta #{{ $pauta->pauta_id }}</h4>
                                            </div>
                                            <div class="modal-body">
                                                <h4>Faça um comentário:</h4>
                                                <textarea class="form-control" name="comentario"></textarea>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Votar a favor</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div id="modal-voto-nao-pauta-{{ $pauta->pauta_id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <form action="{{ route('voto.contra', $pauta->pauta_id) }}" method="POST">
                                            {{ csrf_field() }}
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                                </button>
                                                <h4 class="modal-title">Pauta #{{ $pauta->pauta_id }}</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p>Você está votando contra esta pauta. Seu voto não poderá ser desfeito.</p>
                                                <h4>Faça um comentário:</h4>
                                                <textarea class="form-control" name="comentario"></textarea>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-danger">Votar contra</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

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
                </div>
            </div>
        </div>
    </div>
@endsection
