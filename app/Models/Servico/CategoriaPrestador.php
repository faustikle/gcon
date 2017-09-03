<?php

namespace App\Models\Servico;

use App\Models\Formable;
use Illuminate\Database\Eloquent\Model;

class CategoriaPrestador extends Model implements Formable
{
    protected $primaryKey = 'categoria_prestador_id';

    protected $table = 'categorias_prestador';

    protected $fillable = [
        'descricao',
    ];

    public function getPrimaryKeyName(): string
    {
        return $this->primaryKey;
    }

    public function getId(): int
    {
        return $this->categoria_prestador_id;
    }
}
