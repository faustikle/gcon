@extends('layouts.painel')

@section('titulo', 'Pauta')
@section('titulo_painel', isset($pauta) ? 'Editar Pauta' : 'Nova Pauta')

@section('content')
    <form action="{{ route('pauta.salvar', $reuniao->reuniao_id) }}" method="POST">
        {{ csrf_field() }}
                <input type="hidden" name="pauta_id" value="{{ isset($pauta) ? $pauta->pauta_id : '' }}">
        <div style="margin-bottom: 3%">
            <label>Título</label>
            <input
                    type="text"
                    class="form-control {{ $errors->has('titulo') ? 'parsley-error' : '' }}"
                    placeholder="Titulo da pauta"
                    value="{{ isset($pauta) ? $pauta->titulo : '' }}"
                    name="titulo">
            @if ($errors->has('titulo'))
                <ul class="parsley-errors-list filled" id="parsley-id-20"><li class="parsley-required">{{ $errors->first('titulo') }}</li></ul>
            @endif
        </div>
        <div style="margin-bottom: 3%">
            <label>Descrição</label>
            <textarea
                    name="descricao"
                    placeholder="Descricao da pauta"
                    class="form-control {{ $errors->has('descricao') ? 'parsley-error' : '' }}"
                    rows="5">{{ isset($pauta) ? $pauta->descricao : '' }}</textarea>
            @if ($errors->has('descricao'))
                <ul class="parsley-errors-list filled" id="parsley-id-20"><li class="parsley-required">{{ $errors->first('descricao') }}</li></ul>
            @endif
        </div>
        <div style="margin-bottom: 3%">
            <input class="btn btn-default submit" type="submit" value="{{ isset($pauta) ? 'Salvar' : 'Cadastrar' }}">
            <a class="btn btn-default submit" href="{{ route('reuniao.editar', $reuniao->reuniao_id) }}">Voltar</a>
        </div>

        <div class="clearfix"></div>
    </form>
@endsection
