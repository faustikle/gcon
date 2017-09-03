<?php

namespace App\Models\Servico;

use App\Models\Identificable;
use Illuminate\Database\Eloquent\Model;

class CategoriaPrestador extends Model
{
    use Identificable;

    protected $primaryKey = 'categoria_prestador_id';

    protected $table = 'categorias_prestador';

    protected $fillable = [
        'descricao',
    ];
}
