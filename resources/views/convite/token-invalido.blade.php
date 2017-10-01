@if($tipo === \App\Models\Convite::TOKEN_VENCIDO)
    Este token venceu, entre em contato com seu sindico para enviar novamente.
@else
    Este token não é mais válido.
@endif
