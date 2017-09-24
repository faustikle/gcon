<?php

namespace App\Policies;

use App\Models\Condominio;
use App\Models\Documento;
use App\Models\Usuario;
use Illuminate\Auth\Access\HandlesAuthorization;

class DocumentoPolicy
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
     * @param Documento $documento
     * @return bool
     */
    public function access(Usuario $usuario, Documento $documento)
    {
        return $this->condominioPossuiDocumento($usuario->condominio, $documento);
    }

    /**
     * @param Usuario $usuario
     * @param Documento $documento
     * @return bool
     */
    public function deletar(Usuario $usuario, Documento $documento)
    {
        if (!$usuario->isSindico()) {
            return false;
        }

        return $this->condominioPossuiDocumento($usuario->condominio, $documento);
    }

    /**
     * @param Condominio $condominio
     * @param Documento $documento
     * @return bool
     */
    private function condominioPossuiDocumento(Condominio $condominio, Documento $documento): bool
    {
        return $condominio->whereHas('documentos', function ($query) use ($documento) {
            $query->where('documentos_condominio.documento_id', $documento->documento_id);
        })->exists();
    }
}
