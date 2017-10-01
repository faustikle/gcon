@extends('layouts.painel-externo')

@section('content')
    <div class="animate form login_form">
        <section class="login_content">
            <form method="POST" action="{{ route('condominio.salvar') }}">
                {{ csrf_field() }}
                <h1>Cadastro Condominio</h1>
                <h4>Dados do Sindico</h4>
                <div class="form-group{{ $errors->has('nome_sindico') ? ' bad' : '' }}">
                    <input type="text" class="form-control" placeholder="Nome" name="nome_sindico" required="" value="{{ old('nome_sindico') }}" />
                </div>

                <div class="form-group{{ $errors->has('email') ? ' bad' : '' }}">
                    <input type="email" class="form-control" placeholder="Email" name="email" required="" value="{{ old('email') }}" />
                </div>
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('numero_apartamento') ? ' bad' : '' }}">
                        <input type="text" class="form-control" name="numero_apartamento" placeholder="Apartamento" required="" value="{{ old('numero_apartamento') }}" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="bloco" placeholder="Bloco" value="{{ old('bloco') }}" />
                    </div>
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

                <div class="clearfix"></div>

                <div class="separator">
                    <div class="clearfix"></div>
                    <br />
                </div>

                <h4>Dados do Condominio</h4>
                <div class="form-group{{ $errors->has('nome_condominio') ? ' bad' : '' }}">
                    <input type="text" class="form-control" placeholder="Nome" name="nome_condominio" value="{{ old('nome_condominio') }}" required="" />
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <select class="form-control">
                            @foreach($estados as $estadoId => $estado) {
                            <option value="{{ $estadoId }}">{{ $estado }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('cidade_id') ? ' bad' : '' }}">
                        <select class="form-control" name="cidade_id">
                            @foreach($cidades as $cidadeId => $cidade) {
                            <option value="{{ $cidadeId }}">{{ $cidade }}</option>
                            @endforeach
                        </select>
                    </div>
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
