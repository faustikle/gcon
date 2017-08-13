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
