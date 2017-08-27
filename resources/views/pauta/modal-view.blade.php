<div id="modal-pauta-{{ $pauta->pauta_id }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Pauta #{{ $pauta->pauta_id }}</h4>
            </div>
            <div class="modal-body">
                <h4>{{ $pauta->titulo }}</h4>
                <p>{{ $pauta->descricao }}</p>
                <hr>
                <h5>Comentários</h5>
                @if ($pauta->comentarios->isNotEmpty())
                    <ul class="messages">
                        @foreach($pauta->comentarios as $comentario)
                            <li>
                                <div class="message_date">
                                    <h3 class="date text-info">{{ $comentario->created_at->format('d/m') }}</h3>
                                </div>
                                <div class="message_wrapper">
                                    <h4 class="heading">{{ $comentario->usuario->nome }}</h4>
                                    <blockquote class="message">{{ $comentario->descricao }}</blockquote>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>Sem comentários.</p>
                @endif
            </div>
        </div>
    </div>
</div>