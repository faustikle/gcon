<?php

namespace App\Models;

use App\Models\Reuniao\Pauta;
use App\Models\Reuniao\Voto;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    const ADMINISTRADOR = 'Administrador',
          SINDICO = 'Sindico',
          MORADOR = 'Morador',
          VISITANTE = 'Visitante';

    use Notifiable;
    use Identificable;

    protected $primaryKey = 'usuario_id';

    protected $table = 'usuarios';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'email',
        'password',
        'numero_apartamento',
        'bloco'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function condominio()
    {
        return $this->belongsTo(Condominio::class, 'condominio_id');
    }

    public function votos()
    {
        return $this->hasMany(Voto::class, 'usuario_id');
    }

    public function ocorrencias()
    {
        return $this->hasMany(Ocorrencia::class, 'usuario_id');
    }

    public function comentarios()
    {
        return $this->hasMany(Voto::class, 'usuario_id');
    }

    public function jaVotou(Pauta $pauta): bool
    {
        if ($this->isAdministrador()) {
            return false;
        }

        foreach ($this->votos as $voto) {
            if($voto->pauta->pauta_id === $pauta->pauta_id) {
                return true;
            }
        }

        return false;
    }

    public function scopePorUsuario($query, Usuario $usuario)
    {
        if ($usuario->isAdministrador()) {
            return $query;
        }

        return $query
            ->where('condominio_id', $usuario->condominio_id)
            ->whereNotIn('funcao', [Usuario::ADMINISTRADOR]);
    }

    public function getUltimoAcessoAttribute($ultimoAcesso)
    {
        return $ultimoAcesso ? Carbon::createFromFormat('Y-m-d H:i:s', $ultimoAcesso) : null;
    }

    public function getUltimoAcessoFormatadoAttribute()
    {
        return $this->ultimo_acesso ? $this->ultimo_acesso->format('d/m/Y H:i') : '';
    }

    /**
     * @return bool
     */
    public function isAdministrador(): bool
    {
        return self::ADMINISTRADOR === $this->funcao;
    }

    /**
     * @return bool
     */
    public function isSindico(): bool
    {
        return self::SINDICO === $this->funcao;
    }

    /**
     * @return bool
     */
    public function isMorador(): bool
    {
        return self::MORADOR === $this->funcao;
    }

    /**
     * @return bool
     */
    public function isVisitante(): bool
    {
        return self::VISITANTE === $this->funcao;
    }
}
