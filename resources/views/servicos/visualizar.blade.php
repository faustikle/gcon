@extends('layouts.painel')

@section('titulo', 'Serviços')
@section('titulo_painel', 'Serviço #'. $servico->getId())

@section('content')
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Detalhes</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <h4>Titulo: <small>{{ $servico->titulo }}</small></h4>
                    <h4>Descrição: <small>{{ $servico->descricao }}</small></h4>
                    <h4>Valor: <small>{{ $servico->valor_formatado }}</small></h4>
                    <h4>Data: <small>{{ $servico->data->format('d/m/Y') }}</small></h4>
                    <h4>Prestador de Serviço: <small>{{ $servico->prestador_servico->nome }}</small></h4>
                </div>
                <hr>
                @component('components.form.form')
                    @slot('action', route('servicos.comentar', $servico->getId()))
                    @slot('model', isset($servico) ? $servico : null)

                    @include('components.form.textarea', [
                        'nome' => 'comentario',
                        'placeholder' => 'Comente sobre a realização deste serviço.',
                        'model' => isset($servico) ? $servico : null,
                        'errors' => $errors
                    ])

                    <div style="margin-top: 10px">
                        <input class="btn btn-primary submit" type="submit" value="Comentar">
                    </div>
                @endcomponent
            </div>
        </div>
        <div class="col-md-6">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Comentários </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <ul class="list-unstyled msg_list">
                        @foreach($comentarios as $comentario)
                            <li>
                                <a>
                                    <span class="image">
                                      <img src="{{ asset('assets/images/img.jpg') }}" alt="img">
                                    </span>
                                            <span>
                                      <span>{{ $comentario->usuario->nome }}</span>
                                      <span class="time">{{ $comentario->created_at->diffForHumans() }}</span>
                                    </span>
                                    <span class="message">{{ $comentario->comentario }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
