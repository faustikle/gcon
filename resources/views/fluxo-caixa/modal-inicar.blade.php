<div id="modal-iniciar" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="{{ route('fluxo-caixa.iniciar') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Iniciar Fluxo de Caixa </h4>
                </div>
                <div class="modal-body">
                    <p>Você está prestes a iniciar um fluxo de caixa para o mês de <strong>{{ \App\Util\Data::mesAtual() }}</strong>. Digita um saldo inicial.</p>
                    <h4>Saldo inicial:</h4>
                    <input class="form-control" name="saldo_inicial" value="0.00" />
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Iniciar Fluxo de Caixa</button>
                </div>
            </form>
        </div>
    </div>
</div>