<?php

namespace App\Models\Servico;

use App\Models\Identificable;
use App\Models\Usuario;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

final class ComentarioServico extends Model
{
    use Identificable;

    protected $primaryKey = 'comentario_servico_id';

    protected $table = 'comentarios_servicos';

    protected $fillable = [
        'comentario'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function servico()
    {
        return $this->belongsTo(Servico::class, 'servico_id');
    }
}
