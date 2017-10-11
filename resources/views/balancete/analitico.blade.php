<div class="x_panel">
    <div class="x_title">
        <h2>Balancete Analítico</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        @if($balancete && $balancete->possuiLancamentos())
            <table class="table table-striped">
                <thead>
                <tr>
                    <th style="width: 15%">Tipo</th>
                    <th style="width: 15%">Categoria</th>
                    <th style="width: 20%">Descrição</th>
                    <th style="width: 20%">Observação</th>
                    <th style="width: 15%">Data</th>
                    <th style="width: 15%">Valor</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($balancete->lancamentos as $lancamento)
                        <tr>
                            <td>{{ $lancamento->tipo }}</td>
                            <td>{{ $lancamento->categoria->descricao }}</td>
                            <td>{{ $lancamento->descricao }}</td>
                            <td>{{ $lancamento->observacao }}</td>
                            <td>{{ $lancamento->data->format('d/m/Y') }}</td>
                            <td {{ $lancamento->isDespesa() ? 'class=text-danger' : 'class=text-success' }}>{{ $lancamento->valor_formatado }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>TOTAL</td>
                        <td {{ $balancete->saldo_atual <= 0 ? 'class=text-danger' : 'class=text-success' }}>{{ $balancete->saldo_atual_formatado }}</td>
                    </tr>
                </tbody>
            </table>
        @else
            <div class="text-center">
                Sem lançamentos.
            </div>
        @endif
    </div>
</div>

