<?php

namespace App\Models;

use App\Models\Endereco\Cidade;
use App\Models\Financeiro\FluxoDeCaixa;
use App\Models\Reuniao\Reuniao;
use App\Models\Servico\AvaliacaoPrestador;
use Illuminate\Database\Eloquent\Model;

final class Condominio extends Model
{
    use Identificable;

    protected $primaryKey = 'condominio_id';

    protected $table = 'condominios';

    protected $fillable = [
        'nome',
        'fluxo_de_caixa_id'
    ];

    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'condominio_id');
    }

    public function reunioes()
    {
        return $this->hasMany(Reuniao::class, 'condominio_id');
    }

    public function ocorrencias()
    {
        return $this->hasMany(Ocorrencia::class, 'condominio_id');
    }

    public function avaliacoes_prestador()
    {
        return $this->hasMany(AvaliacaoPrestador::class, 'condominio_id');
    }

    public function fluxos_de_caixa()
    {
        return $this->hasMany(FluxoDeCaixa::class, 'condominio_id');
    }

    public function cidade()
    {
        return $this->belongsTo(Cidade::class, 'cidade_id');
    }

    public function documentos()
    {
        return $this->belongsToMany(Documento::class, 'documentos_condominio', 'condominio_id', 'documento_id');
    }

    public function equals(Condominio $condominio)
    {
        return $this->condominio_id === $condominio->condominio_id;
    }

    /**
     * @return bool
     */
    public function possuiFluxoCaixaAberto(): bool
    {
        return (bool) $this->fluxo_de_caixa_id;
    }

    /**
     * @return FluxoDeCaixa
     */
    public function getFluxoAtual(): FluxoDeCaixa
    {
        return FluxoDeCaixa::find($this->fluxo_de_caixa_id);
    }

    /**
     * @param FluxoDeCaixa $fluxoDeCaixa
     * @return bool
     */
    public function fluxoCaixaAtivo(FluxoDeCaixa $fluxoDeCaixa): bool
    {
        return $fluxoDeCaixa->getId() === $this->fluxo_de_caixa_id;
    }
}
