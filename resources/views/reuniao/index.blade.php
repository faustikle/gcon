@extends('layouts.painel')

@section('titulo', 'Reunião')
@section('titulo_painel', 'Reuniões')

@section('content')
<ul>
    @each('reuniao.reuniao-grid', $reunioes, 'reuniao')
</ul>
@endsection
