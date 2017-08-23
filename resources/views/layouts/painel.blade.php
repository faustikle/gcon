<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>GCON | @yield('titulo')</title>

    @include('shared.css')
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="#" class="site_title"><i class="fa fa-building"></i> <span>Painel GCON</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile">
                    <div class="profile_pic">
                        <img src="{{ asset('assets/images/img.jpg') }}" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Bem vindo,</span>
                        <h2>{{ Auth::user()->nome }}</h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br />
                @include('shared.side-menu')
            </div>
        </div>

        @include('shared.top-navigation')

        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>@yield('titulo_painel')</h3>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="col-md-12 col-sm-8 col-xs-12">
                    @yield("content")
                </div>
            </div>
        </div>

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                GCON - Gestão Comunitária de Condomínios
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>

@include('shared.javascripts')
</body>
</html>