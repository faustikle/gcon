<div class="x_panel">
    <div class="x_title">
        <h2>Extrato Simples</h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <div class="table-responsive">
            <table class="table">
                <tbody>
                <tr>
                    <th style="width:50%">Saldo inicial:</th>
                    @if($fluxoCaixaAtual)
                        <td>{{ $fluxoCaixaAtual->saldo_inicial_formatado }}</td>
                    @else
                        <td>R$ 0,00</td>
                    @endif
                </tr>
                <tr>
                    <th>Total de entradas:</th>
                    @if($fluxoCaixaAtual)
                        <td>{{ $fluxoCaixaAtual->total_entradas_formatado }}</td>
                    @else
                        <td>R$ 0,00</td>
                    @endif
                </tr>
                <tr>
                    <th>Total de saidas:</th>
                    @if($fluxoCaixaAtual)
                        <td>{{ $fluxoCaixaAtual->total_saidas_formatado }}</td>
                    @else
                        <td>R$ 0,00</td>
                    @endif
                </tr>
                <tr>
                    <th>Saldo atual:</th>
                    @if($fluxoCaixaAtual)
                        <td {{ $fluxoCaixaAtual->saldo_atual < 0 ? 'class=text-danger' : 'class=text-success' }}><strong>{{ $fluxoCaixaAtual->saldo_atual_formatado }}</strong></td>
                    @else
                        <td><strong>R$ 0,00</strong></td>
                    @endif
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>