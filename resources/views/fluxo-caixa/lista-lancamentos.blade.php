<div class="x_panel">
    <div class="x_title">
        <h2>Lista de Lançamentos</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        @if($fluxoCaixaAtual && $fluxoCaixaAtual->possuiLancamentos())
            <table class="table table-striped">
                <thead>
                <tr>
                    <th style="width: 15%">Tipo</th>
                    <th style="width: 15%">Categoria</th>
                    <th style="width: 40%">Descrição</th>
                    <th style="width: 15%">Data</th>
                    <th style="width: 15%">Valor</th>
                </tr>
                </thead>
                <tbody>
                @foreach($fluxoCaixaAtual->lancamentos as $lancamento)
                    <tr>
                        <td>{{ $lancamento->tipo }}</td>
                        <td>{{ $lancamento->categoria->descricao }}</td>
                        <td>{{ $lancamento->descricao }}</td>
                        <td>{{ $lancamento->data->format('d/m/Y') }}</td>
                        <td {{ $lancamento->isDespesa() ? 'class=text-danger' : 'class=text-success' }}>{{ $lancamento->valor_formatado }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <div class="text-center">
                Sem lançamentos.
            </div>
        @endif
    </div>
</div>

