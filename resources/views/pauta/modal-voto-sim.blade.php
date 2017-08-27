<div id="modal-voto-sim-pauta-{{ $pauta->pauta_id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="{{ route('voto.aFavor', $pauta->pauta_id) }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Pauta #{{ $pauta->pauta_id }}</h4>
                </div>
                <div class="modal-body">
                    <h4>Faça um comentário:</h4>
                    <textarea class="form-control" name="comentario"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Votar a favor</button>
                </div>
            </form>
        </div>
    </div>
</div>