<?php

namespace App\Models\Reuniao;

use App\Models\Identificable;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Model;

final class Voto extends Model
{
    use Identificable;

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
