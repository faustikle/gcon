<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Pauta extends Model
{
    const ACEITA = 'Aceita',
          RECUSADA = 'Recusada',
          PENDENTE = 'Pendente';

    protected $primaryKey = 'pauta_id';

    protected $table = 'pautas';

    protected $fillable = [
        'titulo',
        'descricao',
    ];

    public function reuniao()
    {
        return $this->belongsTo(Reuniao::class, 'reuniao_id');
    }
}
