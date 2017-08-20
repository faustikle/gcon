<?php

namespace App\Policies;

use App\Models\Pauta;
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

    public function votar(Usuario $usuario, Pauta $pauta)
    {
        $condominioUsuario = $usuario->condominio;
        $condominioPauta = $pauta->reuniao->condominio;

        return $condominioUsuario->equals($condominioPauta);
    }
}
