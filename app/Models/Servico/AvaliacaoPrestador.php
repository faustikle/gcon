<?php

namespace App\Models\Servico;

use App\Models\Condominio;
use App\Models\Identificable;
use Illuminate\Database\Eloquent\Model;

final class AvaliacaoPrestador extends Model
{
    use Identificable;

    const AVALIACAO_MAXIMA = 5;

    protected $primaryKey = 'avaliacao_id';

    protected $table = 'avaliacoes_prestador';

    protected $fillable = [
        'avaliacao'
    ];

    public function condominio()
    {
        return $this->belongsTo(Condominio::class, 'condominio_id');
    }

    public function prestador_categoria()
    {
        return $this->belongsTo(PrestadorCategoria::class, 'prestador_categoria_id');
    }
}
