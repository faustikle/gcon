<?php

namespace App\Models\Financeiro;

use App\Models\Documento;
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

    public function categoria()
    {
        return $this->hasOne(CategoriaLancamento::class, 'categoria_lancamento_id');
    }

    public function fluxo_de_caixa()
    {
        return $this->belongsTo(FluxoDeCaixa::class, 'fluxo_de_caixa_id');
    }

    public function documentos()
    {
        return $this->belongsToMany(Documento::class, 'documentos_lancamento', 'lancamentos_id', 'documento_id');
    }
}
