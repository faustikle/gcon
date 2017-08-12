@extends('layouts.login')

@section('content')
<div class="animate form login_form">
    <section class="login_content">
        <form method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <h1>Acesso Usuário</h1>
            <div class="form-group{{ $errors->has('email') ? ' bad' : '' }}">
                <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required="" />
            </div>
            <div class="form-group{{ $errors->has('password') ? ' bad' : '' }}">
                <input type="password" class="form-control" placeholder="Senha" name="password" required="" />
            </div>
            <div>
                <input class="btn btn-default" type="submit" value="Entrar">
                <a class="reset_pass" href="{{ route('password.request') }}">Esqueci minha senha</a>
            </div>

            <div class="clearfix"></div>

            <div class="separator">
                <p class="change_link">Novo no Site?
                    <a href="#" class="to_register"> Crie uma conta </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                    <h1><i class="fa fa-building"></i> GCON</h1>
                    <p>©2017 Todos os direitos reservados. Gestão Comunitária de Condomínios</p>
                </div>
            </div>
        </form>
    </section>
</div>
@endsection
