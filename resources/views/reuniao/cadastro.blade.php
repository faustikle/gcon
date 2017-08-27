@extends('layouts.painel')

@section('titulo', 'Reunião')
@section('titulo_painel', isset($reuniao) ? 'Editar Reunião' : 'Nova Reunião')

@section('content')
    @include('reuniao.formulario-cadastro', [
        'reuniao' => isset($reuniao) ? $reuniao : null,
    ])

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
                    @can('pautas.excluir')
                    <form action="{{ route('pauta.excluir', $pauta->pauta_id) }}" method="POST">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-md btn-danger"><i class="fa fa-trash-o"></i></button>
                    </form>
                    @endcan
                    @can('pautas.editar')
                    <a
                            href="{{ route('pauta.editar', [$reuniao->reuniao_id, $pauta->pauta_id]) }}"
                            class="btn btn-md btn-info">
                        <i class="fa fa-pencil-square-o"></i>
                    </a>
                    @endcan
                    </div>
                </td>
            </tr>
            @include('pauta.modal-view', compact('pauta'))
        @endforeach
        </tbody>
    </table>
    @endif
@endsection
