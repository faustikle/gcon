<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormOcorrenciaRequest;
use App\Models\Ocorrencia;
use Illuminate\Support\Facades\Auth;

class OcorrenciaController extends Controller
{
    public function index()
    {
        $ocorrencias = Ocorrencia::porUsuario(Auth::user())
            ->orderBy('resolvido', 'asc')
            ->get();

        return view('ocorrencia.index', compact('ocorrencias'));
    }

    public function resolver(Ocorrencia $ocorrencia)
    {
        $this->authorize('resolver', $ocorrencia);

        $ocorrencia->resolver();

        if ($ocorrencia->save()) {
            return redirect()
                ->route('ocorrencia.index')
                ->with('flash-success', config('mensagens.ocorrencia.resolvida-sucesso'));

        }

        return redirect()->back()->with('flash-error', config('mensagens.ocorrencia.resolvida-erro'));
    }

    public function registrar()
    {
        return view('ocorrencia.registrar');
    }

    public function salvar(FormOcorrenciaRequest $request)
    {
        $condominio = Auth::user()->condominio;

        $ocorrencia = new Ocorrencia($request->input());
        $ocorrencia->condominio()->associate($condominio);
        $ocorrencia->usuario()->associate(Auth::user());

        if ($ocorrencia->save()) {
            return redirect()
                ->route('ocorrencia.index')
                ->with('flash-success', config('mensagens.ocorrencia.cadastro-sucesso'));
        }

        return redirect()->back()->with('flash-error', config('mensagens.ocorrencia.cadastro-erro'));
    }
}