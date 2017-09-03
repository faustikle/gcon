<?php

namespace App\Models\Endereco;

use App\Models\Identificable;
use Illuminate\Database\Eloquent\Model;

final class Estado extends Model
{
    use Identificable;

    protected $primaryKey = 'estado_id';

    protected $table = 'estados';

    protected $fillable = [
        'id',
        'nome',
        'uf',
    ];

    public function cidades()
    {
        return $this->hasMany(Cidade::class, 'estado_id');
    }
}
