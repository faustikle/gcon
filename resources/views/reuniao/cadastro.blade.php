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
        </div>

        <div class="clearfix"></div>
    </form>
@endsection
