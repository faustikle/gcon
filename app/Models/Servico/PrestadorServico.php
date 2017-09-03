<?php

namespace App\Models\Servico;

use App\Models\Endereco\Cidade;
use App\Models\Identificable;
use Illuminate\Database\Eloquent\Model;

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
}
