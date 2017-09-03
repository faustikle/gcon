<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Ocorrencia extends Model
{
    use Identificable;

    protected $primaryKey = 'ocorrencia_id';

    protected $table = 'ocorrencias';

    protected $fillable = [
        'titulo',
        'descricao',
        'reclamada',
    ];

    public function condominio()
    {
        return $this->belongsTo(Condominio::class, 'condominio_id');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function resolver()
    {
        $this->resolvido = true;
    }

    public function getSituacaoAttribute()
    {
        return $this->resolvido ? 'Resolvido' : 'Em Aberto';
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $value);
    }

    public function scopePorUsuario($query, Usuario $usuario)
    {
        return $this->where(function ($query) use ($usuario) {
            if ($usuario->isSindico() || $usuario->isMorador()) {
                $query->where('condominio_id', $usuario->condominio_id);
            }

            if ($usuario->isMorador()) {
                $query->where('usuario_id', $usuario->usuario_id);
            }
        });
    }
}
