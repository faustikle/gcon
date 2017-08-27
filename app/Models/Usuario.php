<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    const ADMINISTRADOR = 'Administrador',
          SINDICO = 'Sindico',
          MORADOR = 'Morador',
          VISITANTE = 'Visitante';

    use Notifiable;

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
