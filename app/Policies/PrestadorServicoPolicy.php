<?php

namespace App\Policies;

use App\Models\Servico\PrestadorServico;
use App\Models\Usuario;
use Illuminate\Auth\Access\HandlesAuthorization;

class PrestadorServicoPolicy
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
     * @param PrestadorServico $prestador
     * @return bool
     */
    public function editar(Usuario $usuario, PrestadorServico $prestador)
    {
        return false;
    }

    /**
     * @param Usuario $usuario
     * @param PrestadorServico $prestador
     * @return bool
     */
    public function excluir(Usuario $usuario, PrestadorServico $prestador)
    {
        return false;
    }
}
