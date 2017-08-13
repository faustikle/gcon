<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reuniao extends Model
{
    protected $primaryKey = 'reuniao_id';

    protected $table = 'reunioes';

    public function condominio()
    {
        return $this->belongsTo(Condominio::class, 'condominio_id');
    }

    public function scopePorUsuario($query, Usuario $usuario)
    {
        if ($usuario->isAdministrador()) {
            return $query->all();
        }

        return $query->where('condominio_id', $usuario->condominio_id);
    }
}
