<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reuniao extends Model
{
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

    public function scopePorUsuario($query, Usuario $usuario)
    {
        if ($usuario->isAdministrador()) {
            return $query->all();
        }

        return $query->where('condominio_id', $usuario->condominio_id);
    }
}
