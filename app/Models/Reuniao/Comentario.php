<?php

namespace App\Models\Reuniao;

use App\Models\Identificable;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Model;

final class Comentario extends Model
{
    use Identificable;

    protected $primaryKey = 'comentario_id';

    protected $table = 'comentarios';

    protected $fillable = [
        'descricao',
    ];

    public function pauta()
    {
        return $this->belongsTo(Pauta::class, 'pauta_id');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}
