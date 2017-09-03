<?php

namespace App\Policies;

use App\Models\Reuniao\Pauta;
use App\Models\Usuario;
use Illuminate\Auth\Access\HandlesAuthorization;

class PautaPolicy
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
     * @param Pauta $pauta
     * @return bool
     */
    public function editar(Usuario $usuario, Pauta $pauta)
    {
        return $this->isProprioCondominio($usuario, $pauta);
    }

    /**
     * @param Usuario $usuario
     * @param Pauta $pauta
     * @return bool
     */
    public function excluir(Usuario $usuario, Pauta $pauta)
    {
        return $this->isProprioCondominio($usuario, $pauta);
    }

    /**
     * @param Usuario $usuario
     * @param Pauta $pauta
     * @return bool
     */
    public function votar(Usuario $usuario, Pauta $pauta)
    {
        $condominioUsuario = $usuario->condominio;
        $condominioPauta = $pauta->reuniao->condominio;

        return $condominioUsuario->equals($condominioPauta);
    }

    /**
     * @param Usuario $usuario
     * @param Pauta $pauta
     * @return bool
     */
    private function isProprioCondominio(Usuario $usuario, Pauta $pauta): bool
    {
        $condominioUsuario = $usuario->condominio;
        $condominioReuniao = $pauta->reuniao->condominio;

        return $condominioUsuario->equals($condominioReuniao);
    }
}
