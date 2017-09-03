<?php

namespace App\Models\Endereco;

use App\Models\Identificable;
use Illuminate\Database\Eloquent\Model;

final class Cidade extends Model
{
    use Identificable;

    protected $primaryKey = 'cidade_id';

    protected $table = 'cidades';

    protected $fillable = [
        'id',
        'nome',
        'estado_id',
    ];

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'estado_id');
    }
}
