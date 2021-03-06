<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormReuniaoRequest;
use App\Models\Reuniao\Reuniao;
use Illuminate\Support\Facades\Auth;

class ReuniaoController extends Controller
{
    public function index()
    {
        $reunioes = Reuniao::porUsuario(Auth::user())->get();

        return view('reuniao.index', compact('reunioes'));
    }

    public function visualizar(Reuniao $reuniao)
    {
        return view('reuniao.visualizar', compact('reuniao'));
    }

    public function cadastrar()
    {
        return view('reuniao.cadastro');
    }

    public function editar(Reuniao $reuniao)
    {
        $this->authorize('editar', $reuniao);

        return view('reuniao.cadastro', compact('reuniao'));
    }

    public function salvar(FormReuniaoRequest $request)
    {
        if ($request->isUpdate()) {
            $reuniao = Reuniao::find($request->get('reuniao_id'));
            $reuniao->fill($request->input());
        } else {
            $condominio = Auth::user()->condominio;
            $reuniao = new Reuniao($request->input());
            $reuniao->condominio()->associate($condominio);
        }

        if ($reuniao->save()) {
            return redirect()
                ->route('reuniao.index')
                ->with('flash-success', config('mensagens.reuniao.cadastro-sucesso'));
        }

        return redirect()->back()->with('flash-error', config('mensagens.reuniao.cadastro-erro'));
    }

    public function excluir(Reuniao $reuniao)
    {
        $this->authorize('excluir', $reuniao);

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