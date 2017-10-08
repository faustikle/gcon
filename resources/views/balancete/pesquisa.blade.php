<div class="x_panel">
    <div class="x_title">
        <h2>Pesquisa</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <form method="GET">
            <div class="form-group col-lg-4 col-sm-4 col-xs-12">
                <label for="tipo">Escolha um mês</label>
                <select class="form-control {{ $errors->has('mes') ? 'parsley-error' : '' }}" name="mes-referencia" id="mes">
                    @foreach($fluxosCaixa as $fluxoCaixa)
                        <option value="{{ $fluxoCaixa->getId() }}">{{ $fluxoCaixa->created_at->format('d/m/Y') }} - {{ $fluxoCaixa->fechamento->format('d/m/Y') }}</option>
                    @endforeach
                </select>
                @if ($errors->has('tipo'))
                    <ul class="parsley-errors-list filled" id="parsley-id-20"><li class="parsley-required">{{ $errors->first('tipo') }}</li></ul>
                @endif
            </div>
            <div class="form-group col-lg-4 col-sm-4 col-xs-12">
                <label for="tipo">Tipo</label>
                <div class="radio">
                    @can('balancete.sintetico')
                    <label class="radio-inline">
                        <input checked name="tipo" type="radio" value="sintetico"> Sintético
                    </label>
                    @endcan
                    @can('balancete.analitico')
                    <label class="radio-inline">
                        <input name="tipo" type="radio" value="analitico"> Analítico
                    </label>
                    @endcan
                </div>
            </div>
            <div class="form-group col-md-12">
                <input style="margin-right: 0" type="submit" class="btn btn-success" value="Gerar">
            </div>
        </form>
    </div>
</div>