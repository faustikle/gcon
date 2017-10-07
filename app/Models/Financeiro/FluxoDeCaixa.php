<?php

namespace App\Models\Financeiro;

use App\Models\Condominio;
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

    public function condominio()
    {
        return $this->belongsTo(Condominio::class, 'condominio_id');
    }

    public function lancamentos()
    {
        return $this->hasMany(Lancamento::class, 'fluxo_de_caixa_id');
    }
}
