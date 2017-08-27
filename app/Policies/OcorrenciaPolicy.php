<?php

namespace App\Policies;

use App\Models\Ocorrencia;
use App\Models\Usuario;
use Illuminate\Auth\Access\HandlesAuthorization;

class OcorrenciaPolicy
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
     * @param Ocorrencia $ocorrencia
     * @return bool
     */
    public function resolver(Usuario $usuario, Ocorrencia $ocorrencia)
    {
        return $this->isProprioCondominio($usuario, $ocorrencia);
    }

    /**
     * @param Usuario $usuario
     * @param Ocorrencia $ocorrencia
     * @return bool
     */
    private function isProprioCondominio(Usuario $usuario, Ocorrencia $ocorrencia): bool
    {
        $condominioUsuario = $usuario->condominio;
        $condominioOcorrencia = $ocorrencia->condominio;

        return $condominioUsuario->equals($condominioOcorrencia);
    }
}
