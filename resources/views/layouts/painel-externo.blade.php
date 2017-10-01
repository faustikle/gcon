<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GCON | Cadastro</title>

    @include('shared.css')
</head>

<body class="login">
<div>
    <div class="login_wrapper">
        @yield('content')
    </div>
</div>
@include('shared.javascripts')
</body>
</html>