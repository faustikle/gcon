<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormServicoRequest;
use App\Models\Servico\Servico;
use Illuminate\Support\Facades\Auth;

class ServicoController extends Controller
{
    public function index()
    {
        $servicos = Servico::porUsuario(Auth::user())->get();

        return view('servicos.index', compact('servicos'));
    }

    public function index_compartilhados()
    {
        $servicos = Servico::all();
    }

    public function visualizar(Servico $servico)
    {
    }

    public function cadastrar()
    {
    }

    public function editar(Servico $servico)
    {
    }

    public function salvar(FormServicoRequest $request)
    {
    }

    public function excluir(Servico $servico)
    {
        $this->authorize('excluir', $servico);

        if ($servico->delete()) {
            return redirect()
                ->route('servicos.index')
                ->with('flash-success', config('mensagens.servicos.excluir-sucesso'));
        }

        return redirect()
            ->back()
            ->with('flash-error', config('mensagens.servicos.excluir-erro'));
    }
}