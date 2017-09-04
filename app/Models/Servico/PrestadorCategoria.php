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
}
