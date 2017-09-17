<?php

namespace App\Policies;

use App\Models\Servico\Servico;
use App\Models\Usuario;
use Illuminate\Auth\Access\HandlesAuthorization;

class ServicoPolicy
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
     * @param Servico $servico
     * @return bool
     */
    public function editar(Usuario $usuario, Servico $servico)
    {
        return $this->isProprioCondominio($usuario, $servico->condominio);
    }

    /**
     * @param Usuario $usuario
     * @param Servico $servico
     * @return bool
     */
    public function excluir(Usuario $usuario, Servico $servico)
    {
        return $this->isProprioCondominio($usuario, $servico->condominio);
    }
}
