<?php

namespace App\Models\Financeiro;

use App\Models\Identificable;
use Illuminate\Database\Eloquent\Model;

final class CategoriaLancamento extends Model
{
    use Identificable;

    protected $primaryKey = 'categoria_lancamento_id';

    protected $table = 'categorias_lancamento';

    protected $fillable = [
        'descricao',
    ];
}
