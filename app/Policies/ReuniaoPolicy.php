<?php

namespace App\Policies;

use App\Models\Reuniao\Reuniao;
use App\Models\Usuario;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReuniaoPolicy
{
    use HandlesAuthorization;
    use ProprioCondominioTrait;

    public function before(Usuario $usuario)
    {
        if ($usuario->isAdministrador()) {
            return true;
        }
    }

    /**
     * @param Usuario $usuario
     * @param Reuniao $reuniao
     * @return bool
     */
    public function editar(Usuario $usuario, Reuniao $reuniao)
    {
        return $this->isProprioCondominio($usuario, $reuniao->condominio);
    }

    /**
     * @param Usuario $usuario
     * @param Reuniao $reuniao
     * @return bool
     */
    public function excluir(Usuario $usuario, Reuniao $reuniao)
    {
        return $this->isProprioCondominio($usuario, $reuniao->condominio);
    }

    /**
     * @param Usuario $usuario
     * @param Reuniao $reuniao
     * @return bool
     */
    public function addPauta(Usuario $usuario, Reuniao $reuniao)
    {
        return $this->isProprioCondominio($usuario, $reuniao->condominio);
    }
}
