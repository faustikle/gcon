<?php

namespace App\Models\Reuniao;

use App\Models\Formable;
use Illuminate\Database\Eloquent\Model;

final class Pauta extends Model implements Formable
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

    public function getPrimaryKeyName(): string
    {
        return $this->primaryKey;
    }

    public function getId(): int
    {
        return $this->reuniao_id;
    }

    public function votos()
    {
        return $this->hasMany(Voto::class, 'pauta_id');
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class, 'pauta_id');
    }

    public function reuniao()
    {
        return $this->belongsTo(Reuniao::class, 'reuniao_id');
    }

    public function getTotalVotosAttribute()
    {
        return $this->votos->count();
    }

    public function getVotosNaoAttribute()
    {
        return $this->votos->where('voto', false)->count();
    }

    public function getVotosSimAttribute()
    {
        return $this->votos->where('voto', true)->count();
    }

    public function getAceitaAttribute()
    {
        return $this->votos_sim > $this->votos_nao;
    }

    public function getSituacaoAttribute()
    {
        if ($this->reuniao->aberta) {
            return 'Aguardando votações';
        }

        if ($this->reuniao->agendada) {
            return 'Aguardando inicio';
        }

        return $this->aceita ? 'Aceita' : 'Recusada';
    }
}
