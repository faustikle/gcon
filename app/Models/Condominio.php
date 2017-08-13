<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Condominio extends Model
{
    protected $table = 'condominios';

    protected $fillable = [
        'nome'
    ];

    public function usuarios()
    {
        return $this->hasMany(Usuario::class);
    }
}
