<div id="modal-pauta-{{ $ocorrencia->getId() }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Ocorrência #{{ $ocorrencia->getId() }}</h4>
            </div>
            <div class="modal-body">
                <h4>{{ $ocorrencia->titulo }}</h4>
                <p>{{ $ocorrencia->descricao }}</p>
            </div>
        </div>
    </div>
</div>