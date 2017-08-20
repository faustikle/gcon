<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Comentario extends Model
{
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
