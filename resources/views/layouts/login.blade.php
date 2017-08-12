<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GCON | Login</title>

    <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.min.css') }}" rel="stylesheet">
</head>

<body class="login">
<div>
    <div class="login_wrapper">
        @yield('content')
    </div>
</div>
</body>
</html>