@extends('layouts.painel-externo')

@section('content')
    <div class="animate form login_form">
        <section class="login_content">
            <form method="POST" action="{{ route('convite.salvar', $convite->token) }}">
                {{ csrf_field() }}
                <h1>Cadastro Morador</h1>
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Email" value="{{ $convite->email }}" disabled />
                </div>

                <div class="form-group{{ $errors->has('nome') ? ' bad' : '' }}">
                    <input type="text" class="form-control" placeholder="Nome" name="nome" value="{{ $convite->nome }}" required="" />
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Apartamento" value="{{ $convite->numero_apartamento }}" disabled />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Bloco" value="{{ $convite->bloco }}" disabled />
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="separator">
                    <div class="clearfix"></div>
                    <br />
                </div>

                <div class="form-group{{ $errors->has('password') ? ' bad' : '' }}">
                    <input type="password" class="form-control" placeholder="Senha" name="password" required="" />
                    @if ($errors->has('password'))
                        <ul class="parsley-errors-list filled" id="parsley-id-20"><li class="parsley-required">{{ $errors->first('password') }}</li></ul>
                    @endif
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Senha Novamente" name="password_confirmation" required="" />
                </div>

                <div>
                    <input class="btn btn-default" type="submit" value="Cadastrar">
                </div>

                <div class="clearfix"></div>

                <div class="separator">
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
