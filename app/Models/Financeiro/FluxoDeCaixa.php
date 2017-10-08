<?php

namespace App\Models\Financeiro;

use App\Models\Condominio;
use App\Models\Identificable;
use App\Util\Data;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

final class FluxoDeCaixa extends Model
{
    use Identificable;

    protected $primaryKey = 'fluxo_de_caixa_id';

    protected $table = 'fluxos_de_caixa';

    protected $fillable = [
        'saldo_inicial',
        'fechamento'
    ];

    public function condominio()
    {
        return $this->belongsTo(Condominio::class, 'condominio_id');
    }

    public function lancamentos()
    {
        return $this->hasMany(Lancamento::class, 'fluxo_de_caixa_id');
    }

    public function getSaldoInicialFormatadoAttribute()
    {
        return 'R$ '. number_format($this->saldo_inicial, 2, ',', '.');
    }

    public function getTotalEntradasAttribute()
    {
        return $this->getTotalReceitas();
    }

    public function getTotalEntradasFormatadoAttribute()
    {
        return 'R$ '. number_format($this->total_entradas, 2, ',', '.');
    }

    public function getTotalSaidasAttribute()
    {
        return $this->getTotalDespesas();
    }

    public function getTotalSaidasFormatadoAttribute()
    {
        return 'R$ '. number_format($this->total_saidas, 2, ',', '.');
    }

    public function getSaldoAtualAttribute()
    {
        return ($this->saldo_inicial + $this->getTotalReceitas()) - $this->getTotalDespesas();
    }

    public function getSaldoAtualFormatadoAttribute()
    {
        return 'R$ '. number_format($this->saldo_atual, 2, ',', '.');
    }

    public function getFechamentoAttribute($data)
    {
        return $data ? Carbon::createFromFormat('Y-m-d H:s:i', $data) : null;
    }

    /**
     * @return bool
     */
    public function possuiLancamentos(): bool
    {
        return $this->lancamentos->count() > 0;
    }

    /**
     * @return bool
     */
    public function isFechado(): bool
    {
        return (bool) $this->fechamento;
    }

    /**
     * @return float
     */
    private function getTotalReceitas(): float
    {
        $total = 0;

        /** @var Lancamento $lancamento */
        foreach ($this->lancamentos as $lancamento) {
            if ($lancamento->isReceita()) {
                $total += $lancamento->valor;
            }
        }

        return $total;
    }

    /**
     * @return float
     */
    private function getTotalDespesas(): float
    {
        $total = 0;

        /** @var Lancamento $lancamento */
        foreach ($this->lancamentos as $lancamento) {
            if ($lancamento->isDespesa()) {
                $total += $lancamento->valor;
            }
        }

        return $total;
    }
}
