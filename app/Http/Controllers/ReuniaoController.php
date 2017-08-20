<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormReuniaoRequest;
use App\Models\Reuniao;
use Illuminate\Support\Facades\Auth;

class ReuniaoController extends Controller
{
    public function index()
    {
        $this->authorize('reunioes.listar');

        $reunioes = Reuniao::porUsuario(Auth::user())->get();

        return view('reuniao.index', compact('reunioes'));
    }

    public function visualizar(Reuniao $reuniao)
    {
        $this->authorize('reunioes.visualizar');

        return view('reuniao.visualizar', compact('reuniao'));
    }

    public function cadastrar()
    {
        $this->authorize('reunioes.cadastro');

        return view('reuniao.cadastro');
    }

    public function salvar(FormReuniaoRequest $request)
    {
        $this->authorize('reunioes.cadastro');

        $condominio = Auth::user()->condominio;
        $reuniao = new Reuniao($request->input());

        $reuniao->condominio()->associate($condominio);

        if ($reuniao->save()) {
            return redirect()
                ->route('reuniao.index')
                ->with('flash-success', config('mensagens.reuniao.cadastro-sucesso'));
        }

        return redirect()->back()->with('flash-error', config('mensagens.reuniao.cadastro-erro'));
    }

    public function excluir(Reuniao $reuniao)
    {
        $this->authorize('reunioes.excluir');

        if ($reuniao->delete()) {
            return redirect()
                ->route('reuniao.index')
                ->with('flash-success', config('mensagens.reuniao.excluir-sucesso'));
        }

        return redirect()
            ->back()
            ->with('flash-error', config('mensagens.reuniao.excluir-erro'));
    }
}