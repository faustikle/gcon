<div class="rateYo"
     data-rateyo-rating="{{ $total or 0 }}"
     data-rateyo-read-only="{{ isset($readOnly) ? $readOnly : 'true' }}"
     data-rateyo-max-value="{{ \App\Models\Servico\AvaliacaoPrestador::AVALIACAO_MAXIMA }}"
     data-rateyo-star-width="20px"></div>