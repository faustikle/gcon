@extends('layouts.painel')

@section('titulo', 'Reunião')
@section('titulo_painel', 'Nova Reunião')

@section('content')
    <form action="{{ route('reuniao.salvar') }}" method="POST">
        {{ csrf_field() }}
        <div style="margin-bottom: 3%">
            <label>Título</label>
            <input type="text" class="form-control" placeholder="Titulo da reunião" name="titulo" required="">
        </div>
        <div style="margin-bottom: 3%">
            <label>Data de início</label>
            <input type="date" class="form-control" name="data_abertura" required="">
        </div>
        <div style="margin-bottom: 3%">
            <label>Date de término</label>
            <input type="date" class="form-control" name="data_encerramento" required="">
        </div>
        <div style="margin-bottom: 3%">
            <input class="btn btn-default submit" type="submit" value="Cadastrar">
            <a class="btn btn-default submit" href="{{ route('reuniao.index') }}">Voltar</a>
        </div>

        <div class="clearfix"></div>
    </form>
@endsection
