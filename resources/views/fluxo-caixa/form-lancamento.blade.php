<div class="x_panel">
    <div class="x_title">
        <h2>Lançamentos</h2>
        <div class="clearfix"></div>
    </div>
    @if($errors)
    @endif
    <div class="x_content">
        <form action="{{ $fluxoCaixaAtual ? route('lancamento.salvar', $fluxoCaixaAtual->getId()) : '' }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group col-lg-4 col-sm-4 col-xs-12">
                <label for="tipo">Tipo*</label>
                <select class="form-control {{ $errors->has('tipo') ? 'parsley-error' : '' }}" name="tipo" id="tipo" {{ $fluxoCaixaAtual ? '' : 'disabled'  }}>
                    @if($fluxoCaixaAtual)
                        <option value="{{ \App\Models\Financeiro\Lancamento::DESPESA }}">{{ \App\Models\Financeiro\Lancamento::DESPESA }}</option>
                        <option value="{{ \App\Models\Financeiro\Lancamento::RECEITA }}">{{ \App\Models\Financeiro\Lancamento::RECEITA }}</option>
                    @endif
                </select>
                @if ($errors->has('tipo'))
                    <ul class="parsley-errors-list filled" id="parsley-id-20"><li class="parsley-required">{{ $errors->first('tipo') }}</li></ul>
                @endif
            </div>
            <div class="form-group col-lg-8 col-sm-8 col-xs-12">
                <label for="categoria">Categoria*</label>
                <select class="form-control {{ $errors->has('categoria') ? 'parsley-error' : '' }}" name="categoria" id="categoria" {{ $fluxoCaixaAtual ? '' : 'disabled'  }}>
                    @if($fluxoCaixaAtual)
                        @foreach($categoriasLancamento as $id => $categoria)
                            <option value="{{ $id }}">{{ $categoria }}</option>
                        @endforeach
                    @endif
                </select>
                @if ($errors->has('categoria'))
                    <ul class="parsley-errors-list filled" id="parsley-id-20"><li class="parsley-required">{{ $errors->first('categoria') }}</li></ul>
                @endif
            </div>
            <div class="form-group col-lg-12 col-xs-12">
                <label for="descricao">Descrição*</label>
                <input type="text" name="descricao" class="form-control {{ $errors->has('descricao') ? 'parsley-error' : '' }}" id="descricao" {{ $fluxoCaixaAtual ? '' : 'disabled'  }}>
                @if ($errors->has('descricao'))
                    <ul class="parsley-errors-list filled" id="parsley-id-20"><li class="parsley-required">{{ $errors->first('descricao') }}</li></ul>
                @endif
            </div>
            <div class="form-group col-lg-6 col-xs-12">
                <label for="data">Data*</label>
                <input type="date" name="data" class="form-control {{ $errors->has('data') ? 'parsley-error' : '' }}" id="data" {{ $fluxoCaixaAtual ? '' : 'disabled'  }}>
                @if ($errors->has('data'))
                    <ul class="parsley-errors-list filled" id="parsley-id-20"><li class="parsley-required">{{ $errors->first('data') }}</li></ul>
                @endif
            </div>
            <div class="form-group col-lg-6 col-xs-12">
                <label for="valor">Valor*</label>
                <input type="text" name="valor" class="form-control {{ $errors->has('valor') ? 'parsley-error' : '' }}" id="valor" {{ $fluxoCaixaAtual ? '' : 'disabled'  }}>
                @if ($errors->has('valor'))
                    <ul class="parsley-errors-list filled" id="parsley-id-20"><li class="parsley-required">{{ $errors->first('valor') }}</li></ul>
                @endif
            </div>
            <div class="form-group col-lg-12 col-xs-12">
                <label for="valor">Observação</label>
                <input type="text" name="observacao" class="form-control {{ $errors->has('observacao') ? 'parsley-error' : '' }}" id="valor" {{ $fluxoCaixaAtual ? '' : 'disabled'  }}>
                @if ($errors->has('observacao'))
                    <ul class="parsley-errors-list filled" id="parsley-id-20"><li class="parsley-required">{{ $errors->first('observacao') }}</li></ul>
                @endif
            </div>
            <div class="form-group col-md-12 text-right">
                <input style="margin-right: 0" type="submit" class="btn btn-success" value="Adicionar Lançamento" {{ $fluxoCaixaAtual ? '' : 'disabled'  }}>
            </div>
        </form>
    </div>
</div>