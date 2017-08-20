<?php

namespace App\Policies;

use App\Models\Reuniao;
use App\Models\Usuario;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReuniaoPolicy
{
    use HandlesAuthorization;

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
    public function excluir(Usuario $usuario, Reuniao $reuniao)
    {
        $condominioUsuario = $usuario->condominio;
        $condominioReuniao = $reuniao->condominio;

        return $condominioUsuario->equals($condominioReuniao);
    }
}
