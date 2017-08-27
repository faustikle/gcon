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
                    <h4>Data Abertura: <small>{{ $reuniao->data_abertura->format('d/m/Y') }}</small></h4>
                    <h4>Data Encerramento: <small>{{ $reuniao->data_encerramento->format('d/m/Y') }}</small></h4>
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

                            @include('pauta.modal-voto-sim', compact('pauta'))
                            @include('pauta.modal-voto-nao', compact('pauta'))
                            @include('pauta.modal-view', compact('pauta'))
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
