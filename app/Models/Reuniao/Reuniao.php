<?php

namespace App\Models\Reuniao;

use App\Models\Condominio;
use App\Models\Identificable;
use App\Models\Usuario;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Reuniao extends Model
{
    use Identificable;

    protected $primaryKey = 'reuniao_id';

    protected $table = 'reunioes';

    protected $fillable = [
        'titulo',
        'data_abertura',
        'data_encerramento',
    ];

    public function condominio()
    {
        return $this->belongsTo(Condominio::class, 'condominio_id');
    }

    public function pautas()
    {
        return $this->hasMany(Pauta::class, 'reuniao_id');
    }

    public function getDataAberturaAttribute($dataAbertura)
    {
        return Carbon::createFromFormat('Y-m-d H:s:i', $dataAbertura);
    }

    public function getDataEncerramentoAttribute($dataEncerramento)
    {
        return Carbon::createFromFormat('Y-m-d H:s:i', $dataEncerramento);
    }

    public function getAgendadaAttribute()
    {
        return Carbon::now()->lt($this->getAbertura());
    }

    public function getEncerradaAttribute()
    {
        return Carbon::now()->gt($this->getEncerramento());
    }

    public function getAbertaAttribute()
    {
        $dataAtual = Carbon::now();

        return $dataAtual->gte($this->getAbertura()) && $dataAtual->lte($this->getEncerramento());
    }

    public function getSituacaoAttribute()
    {
        if ($this->agendada) {
            return 'Agendada';
        }

        if ($this->aberta) {
            return 'Aberta';
        }

        return 'Encerrada';
    }

    public function scopePorUsuario($query, Usuario $usuario)
    {
        if ($usuario->isAdministrador()) {
            return $query;
        }

        return $query->where('condominio_id', $usuario->condominio_id);
    }

    private function getAbertura(): Carbon
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->data_abertura)->startOfDay();
    }

    private function getEncerramento(): Carbon
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->data_encerramento)->endOfDay();
    }
}
