@extends('layouts.painel')

@section('titulo', 'Painel')
@section('titulo_painel', 'Painel '. Auth::user()->funcao)

@section('content')
    <script>
        $(document).ready(function() {
            /**
             * Aqui nesses events é onde serão adicionados os eventos.
             * https://fullcalendar.io/
             * **/
            $('#agenda').fullCalendar({
                events: [
                    {
                        title  : 'TESTE1',
                        start  : '2017-10-01'
                    },
                    {
                        title  : 'TESTE2',
                        start  : '2017-10-05',
                        end    : '2017-10-07'
                    },
                    {
                        title  : 'TESTE3',
                        start  : '2017-10-09T12:30:00',
                        allDay : false
                    }
                ]
            })
        })
    </script>
    <div id='agenda'></div>
@endsection
