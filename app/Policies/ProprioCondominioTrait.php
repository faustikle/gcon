<?php

namespace App\Policies;

use App\Models\Condominio;
use App\Models\Usuario;

trait ProprioCondominioTrait
{
    /**
     * @param Usuario $usuario
     * @param Condominio $condominioAcessado
     * @return bool
     */
    public function isProprioCondominio(Usuario $usuario, Condominio $condominioAcessado): bool
    {
        $condominioUsuario = $usuario->condominio;

        return $condominioUsuario->equals($condominioAcessado);
    }
}
