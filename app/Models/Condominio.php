<?php

namespace App\Models;

use App\Models\Endereco\Cidade;
use App\Models\Reuniao\Reuniao;
use App\Models\Servico\AvaliacaoPrestador;
use Illuminate\Database\Eloquent\Model;

final class Condominio extends Model
{
    use Identificable;

    protected $primaryKey = 'condominio_id';

    protected $table = 'condominios';

    protected $fillable = [
        'nome'
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

    public function cidade()
    {
        return $this->belongsTo(Cidade::class, 'cidade_id');
    }

    public function equals(Condominio $condominio)
    {
        return $this->condominio_id === $condominio->condominio_id;
    }
}
