<?php

namespace App\Models;

use Carbon\Carbon;
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

    public function votos()
    {
        return $this->hasMany(Voto::class, 'pauta_id');
    }

    public function reuniao()
    {
        return $this->belongsTo(Reuniao::class, 'reuniao_id');
    }

    public function getTotalVotosAttribute()
    {
        return $this->votos->count();
    }

    public function permitiVotacao(): bool
    {
        $aberturaReuniao = Carbon::createFromFormat('Y-m-d H:i:s', $this->reuniao->data_abertura);
        $encerramentoReuniao = Carbon::createFromFormat('Y-m-d H:i:s', $this->reuniao->data_encerramento);

        return Carbon::now()->between($aberturaReuniao, $encerramentoReuniao);
    }
}
