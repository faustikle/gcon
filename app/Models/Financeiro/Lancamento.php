<?php

namespace App\Models\Financeiro;

use App\Models\Identificable;
use Illuminate\Database\Eloquent\Model;

final class Lancamento extends Model
{
    use Identificable;

    const RECEITA = 'Receita';
    const DESPESA = 'Despesa';

    protected $primaryKey = 'lancamentos_id';

    protected $table = 'lancamentos';

    protected $fillable = [
        'valor',
        'descricao',
        'tipo',
        'observacao'
    ];
}
