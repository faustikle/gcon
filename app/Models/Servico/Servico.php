<?php

namespace App\Models\Servico;

use App\Models\Condominio;
use App\Models\Identificable;
use Illuminate\Database\Eloquent\Model;

final class Servico extends Model
{
    use Identificable;

    protected $primaryKey = 'servico_id';

    protected $table = 'servicos';

    protected $fillable = [
        'titulo',
        'descricao',
        'valor',
        'data'
    ];

    public function condominio()
    {
        return $this->belongsTo(Condominio::class, 'condominio_id');
    }

    public function prestador_servico()
    {
        return $this->belongsTo(PrestadorServico::class, 'prestador_servico_id');
    }
}
