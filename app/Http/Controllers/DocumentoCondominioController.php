<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormDocumentoRequest;
use App\Models\Documento;
use Dotenv\Exception\InvalidFileException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocumentoCondominioController extends Controller
{
    public function index()
    {
        $documentos = Auth::user()->condominio->documentos;

        return view('documento-condominio.index', compact('documentos'));
    }

    public function salvar(FormDocumentoRequest $request)
    {
        /** @var Condominio $condominio */
        $condominio = Auth::user()->condominio;
        $file = $request->file('documento');
        $fileSize = $file->getSize();

        $caminho = Storage::put('', $file);

        if (!$caminho) {
            throw new InvalidFileException();
        }

        $documento = new Documento([
            'nome' => $request->input('nome'),
            'descricao' => $request->input('descricao'),
            'caminho' => $caminho,
            'tamanho' => $fileSize
        ]);

        if ($documento->save()) {
            $condominio->documentos()->attach($documento);
            $condominio->save();

            return redirect()
                ->route('documentos-condominio.index')
                ->with('flash-success', config('mensagens.documentos.cadastro-sucesso'));
        }

        return redirect()
            ->route('documentos-condominio.index')
            ->with('flash-error', config('mensagens.documentos.cadastro-erro'));
    }

    public function cadastro()
    {
        return view('documento-condominio.cadastro');
    }
}