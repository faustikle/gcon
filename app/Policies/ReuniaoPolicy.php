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
    public function editar(Usuario $usuario, Reuniao $reuniao)
    {
        return $this->isProprioCondominio($usuario, $reuniao);
    }

    /**
     * @param Usuario $usuario
     * @param Reuniao $reuniao
     * @return bool
     */
    public function excluir(Usuario $usuario, Reuniao $reuniao)
    {
        return $this->isProprioCondominio($usuario, $reuniao);
    }

    /**
     * @param Usuario $usuario
     * @param Reuniao $reuniao
     * @return bool
     */
    public function addPauta(Usuario $usuario, Reuniao $reuniao)
    {
        return $this->isProprioCondominio($usuario, $reuniao);
    }

    /**
     * @param Usuario $usuario
     * @param Reuniao $reuniao
     * @return bool
     */
    private function isProprioCondominio(Usuario $usuario, Reuniao $reuniao): bool
    {
        $condominioUsuario = $usuario->condominio;
        $condominioReuniao = $reuniao->condominio;

        return $condominioUsuario->equals($condominioReuniao);
    }
}
