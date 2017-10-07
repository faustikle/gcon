<?php

namespace App\Models\Financeiro;

use App\Models\Identificable;
use Illuminate\Database\Eloquent\Model;

final class FluxoDeCaixa extends Model
{
    use Identificable;

    protected $primaryKey = 'fluxo_de_caixa_id';

    protected $table = 'fluxos_de_caixa';

    protected $fillable = [
        'saldo_inicial',
    ];
}
