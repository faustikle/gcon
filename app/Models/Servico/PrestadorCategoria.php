<?php

namespace App\Models\Servico;

use App\Models\Identificable;
use Illuminate\Database\Eloquent\Model;

final class PrestadorCategoria extends Model
{
    use Identificable;

    protected $primaryKey = 'prestador_categoria_id';

    protected $table = 'prestadores_categorias';

    public function categoria_prestador()
    {
        return $this->belongsTo(CategoriaPrestador::class, 'categoria_prestador_id');
    }

    public function prestador_servico()
    {
        return $this->belongsTo(PrestadorServico::class, 'prestador_servico_id');
    }

    public function avaliacoes()
    {
        return $this->hasMany(AvaliacaoPrestador::class, 'prestador_categoria_id');
    }

    public function getMediaAvaliacoesArredondadoAttribute()
    {
        return round($this->media_avaliacoes * 2) / 2;
    }

    public function getMediaAvaliacoesAttribute()
    {
        $somaAvaliacoes = 0;

        $avaliacoes = $this->avaliacoes;
        $totalAvaliacoes = $avaliacoes->count();

        foreach ($avaliacoes as $avaliacao) {
            $somaAvaliacoes += $avaliacao->avaliacao;
        }

        $mediaAvaliacoes = $somaAvaliacoes ? $somaAvaliacoes / $totalAvaliacoes : $somaAvaliacoes;

        return $mediaAvaliacoes;
    }

    public function equals(PrestadorCategoria $categoria)
    {
        return $categoria->categoria_prestador->getId() === $this->categoria_prestador->getID();
    }
}
