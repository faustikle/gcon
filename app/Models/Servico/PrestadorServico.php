<?php

namespace App\Models\Servico;

use App\Models\Condominio;
use App\Models\Endereco\Cidade;
use App\Models\Identificable;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Webmozart\Assert\Assert;

final class PrestadorServico extends Model
{
    use Identificable;

    protected $primaryKey = 'prestador_servico_id';

    protected $table = 'prestadores_servico';

    protected $fillable = [
        'nome',
        'responsavel',
        'telefone',
        'celular',
        'cpf',
        'cnpj',
        'endereco',
        'numero',
        'bairro',
        'cep',
    ];

    public function cidade()
    {
        return $this->belongsTo(Cidade::class, 'cidade_id');
    }

    public function categorias()
    {
        return $this->hasMany(PrestadorCategoria::class, 'prestador_servico_id');
    }

    public function hasCategoria(CategoriaPrestador $categoriaProcurada): bool
    {
        foreach ($this->categorias as $categoria) {
            if ($categoriaProcurada->getId() === $categoria->categoria_prestador->getId()) {
                return true;
            }
        }

        return false;
    }

    public function getMediaAvaliacoesArredondadoAttribute()
    {
        return round($this->media_avaliacoes * 2) / 2;
    }

    public function getMediaAvaliacoesAttribute()
    {
        $somaAvaliacoes = 0;
        $totalAvaliacoes = 0;
        $categorias = $this->categorias;

        foreach ($categorias as $categoria) {
            $avaliacoes = $categoria->avaliacoes;
            $totalAvaliacoes += $avaliacoes->count();

            foreach ($avaliacoes as $avaliacao) {
                $somaAvaliacoes += $avaliacao->avaliacao;
            }
        }

        $mediaAvaliacoes = $somaAvaliacoes ? $somaAvaliacoes / $totalAvaliacoes : $somaAvaliacoes;

        return $mediaAvaliacoes;
    }

    public function getCategoriasNomeAttribute()
    {
        return $this->categorias()->get()->map(
            function (PrestadorCategoria $prestadorCategoria) {
                return $prestadorCategoria->categoria_prestador->descricao;
            }
        )->implode(', ');
    }

    public function getCategoriasIdsAttribute()
    {
        return $this->categorias()->get()->map(
            function (PrestadorCategoria $prestadorCategoria) {
                return $prestadorCategoria->categoria_prestador->getId();
            }
        )->toArray();
    }

    public function scopePorCidadeUsuario($query, Usuario $usuario)
    {
        if ($usuario->isAdministrador()) {
            return $query;
        }

        return $query->where('cidade_id', $usuario->condominio->cidade_id);
    }

    public function deletarCategoriasNaoSelecionadas(Collection $categoriasNaoSelecionadas)
    {
        foreach ($this->categorias as $categoria) {
            if (!$categoriasNaoSelecionadas->contains(
                'categoria_prestador_id',
                    $categoria->categoria_prestador->getId())
            ) {
                $categoria->delete();
            }
        }
    }

    /**
     * @param Condominio $condominio
     * @param CategoriaPrestador $categoria
     * @param int $avaliacao
     * @return bool
     */
    public function avaliar(Condominio $condominio, CategoriaPrestador $categoria, int $avaliacao): bool
    {
        Assert::lessThanEq($avaliacao, AvaliacaoPrestador::AVALIACAO_MAXIMA);

        $prestadorCategoria = $this
            ->categorias()
            ->where('categoria_prestador_id', $categoria->getId())
            ->first();

        if (!$prestadorCategoria) {
            throw new ModelNotFoundException();
        }

        $avaliacao = new AvaliacaoPrestador(['avaliacao' => $avaliacao]);
        $avaliacao->condominio()->associate($condominio);
        $avaliacao->prestador_categoria()->associate($prestadorCategoria);

        return $avaliacao->save();
    }
}
