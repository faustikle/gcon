<?php

namespace App\Http\Controllers;

use App\Models\Documento;

class DocumentoController extends Controller
{
    public function download(Documento $documento)
    {
        $this->authorize('download', $documento);

        if (!$documento->exists()) {
            return redirect()
                ->back()
                ->with('flash-error', config('mensagens.documentos.nao-encontrado'));
        }

        return response($documento->getConteudo(), 200,['Content-Type' => $documento->getMime()]);
    }

    public function excluir(Documento $documento)
    {
        $this->authorize('deletar', $documento);

        if ($documento->delete()) {
            return redirect()
                ->back()
                ->with('flash-success', config('mensagens.documentos.excluir-sucesso'));
        }

        return redirect()
            ->back()
            ->with('flash-error', config('mensagens.documentos.excluir-erro'));
    }
}