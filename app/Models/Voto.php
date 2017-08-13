<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Voto extends Model
{
    protected $primaryKey = 'voto_id';

    protected $table = 'votos';

    protected $fillable = [
        'voto',
    ];

    public function pauta()
    {
        return $this->belongsTo(Pauta::class, 'pauta_id');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}
