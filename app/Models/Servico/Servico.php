<?php

namespace App\Models\Servico;

use App\Models\Condominio;
use App\Models\Identificable;
use App\Models\Usuario;
use Carbon\Carbon;
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

    public function comentarios()
    {
        return $this->hasMany(ComentarioServico::class, 'servico_id');
    }

    public function getDataAttribute($data)
    {
        return Carbon::createFromFormat('Y-m-d H:s:i', $data);
    }

    public function getValorFormatadoAttribute()
    {
        return 'R$ '. number_format($this->valor, 2, ',', '.');
    }

    public function scopePorUsuario($query, Usuario $usuario)
    {
        if ($usuario->isAdministrador()) {
            return $query;
        }

        return $query->where('condominio_id', $usuario->condominio_id);
    }

    /**
     * @param Usuario $usuario
     * @param string $comentario
     * @return ComentarioServico
     */
    public function comentar(Usuario $usuario, string $comentario): ComentarioServico
    {
        $comentarioServico = new ComentarioServico(['comentario' => $comentario]);
        $comentarioServico->servico()->associate($this);
        $comentarioServico->usuario()->associate($usuario);

        $this->comentarios()->save($comentarioServico);

        return $comentarioServico;
    }
}
