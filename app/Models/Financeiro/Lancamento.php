<?php

namespace App\Models\Financeiro;

use App\Models\Documento;
use App\Models\Identificable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

final class Lancamento extends Model
{
    use Identificable;

    const RECEITA = 'Receita';
    const DESPESA = 'Despesa';

    protected $primaryKey = 'lancamento_id';

    protected $table = 'lancamentos';

    protected $fillable = [
        'valor',
        'descricao',
        'tipo',
        'observacao',
        'data'
    ];

    public function fluxo_de_caixa()
    {
        return $this->belongsTo(FluxoDeCaixa::class, 'fluxo_de_caixa_id');
    }

    public function documentos()
    {
        return $this->belongsToMany(Documento::class, 'documentos_lancamento', 'lancamento_id', 'documento_id');
    }

    public function getDataAttribute($data)
    {
        return Carbon::createFromFormat('Y-m-d H:s:i', $data);
    }

    public function getValorFormatadoAttribute()
    {
        return 'R$ '. number_format($this->valor, 2, ',', '.');
    }

    public function getCategoriaAttribute()
    {
        return CategoriaLancamento::find($this->categoria_lancamento_id);
    }

    /**
     * @return bool
     */
    public function isDespesa(): bool
    {
        return self::DESPESA === $this->tipo;
    }

    /**
     * @return bool
     */
    public function isReceita(): bool
    {
        return self::RECEITA === $this->tipo;
    }
}
