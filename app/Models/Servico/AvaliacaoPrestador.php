<?php

namespace App\Models\Servico;

use App\Models\Condominio;
use App\Models\Identificable;
use Illuminate\Database\Eloquent\Model;

final class AvaliacaoPrestador extends Model
{
    use Identificable;

    protected $primaryKey = 'avaliacao_id';

    protected $table = 'avaliacoes_prestador';

    protected $fillable = [
        'avaliacao'
    ];

    public function condominio()
    {
        return $this->belongsTo(Condominio::class, 'condominio_id');
    }
}
