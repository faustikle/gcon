<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Reuniao extends Model implements Formable
{
    protected $primaryKey = 'reuniao_id';

    protected $table = 'reunioes';

    protected $fillable = [
        'titulo',
        'data_abertura',
        'data_encerramento',
    ];

    public function getPrimaryKeyName(): string
    {
        return $this->primaryKey;
    }

    public function getId(): int
    {
        return $this->reuniao_id;
    }

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
        return Carbon::createFromFormat('Y-m-d h:s:i', $dataAbertura);
    }

    public function getDataEncerramentoAttribute($dataEncerramento)
    {
        return Carbon::createFromFormat('Y-m-d h:s:i', $dataEncerramento);
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
        return Carbon::now()->between($this->getAbertura(), $this->getEncerramento());
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
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->data_abertura);
    }

    private function getEncerramento(): Carbon
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->data_encerramento);
    }
}
