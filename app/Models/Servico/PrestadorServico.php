<?php

namespace App\Models\Servico;

use App\Models\Endereco\Cidade;
use App\Models\Formable;
use Illuminate\Database\Eloquent\Model;

final class PrestadorServico extends Model implements Formable
{
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

    public function getPrimaryKeyName(): string
    {
        return $this->primaryKey;
    }

    public function getId(): int
    {
        return $this->prestador_servico_id;
    }

    public function cidade()
    {
        return $this->belongsTo(Cidade::class, 'cidade_id');
    }
}
