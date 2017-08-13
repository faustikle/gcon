<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Condominio extends Model
{
    protected $primaryKey = 'condominio_id';

    protected $table = 'condominios';

    protected $fillable = [
        'nome'
    ];

    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'condominio_id');
    }

    public function reunioes()
    {
        return $this->hasMany(Reuniao::class, 'condominio_id');
    }
}