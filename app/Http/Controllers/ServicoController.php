<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormServicoRequest;
use App\Models\Servico\PrestadorServico;
use App\Models\Servico\Servico;
use Illuminate\Http\Request;
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

        return view('servicos.index_compartilhados', compact('servicos'));
    }

    public function visualizar(Servico $servico)
    {
        $comentarios = $servico->comentarios()->orderBy('created_at', 'desc')->get();

        return view('servicos.visualizar', compact('servico', 'comentarios'));
    }

    public function cadastrar()
    {
        return view('servicos.cadastro', $this->getSelectsPopulate());
    }

    public function editar(Servico $servico)
    {
        return view('servicos.cadastro', array_merge($this->getSelectsPopulate(), compact('servico')));
    }

    public function comentar(Request $request, Servico $servico)
    {
        $comentario = $servico->comentar(Auth::user(), $request->input('comentario'));

        if ($comentario) {
            return redirect()
                ->route('servicos.visualizar', $servico->getId())
                ->with('flash-success', config('mensagens.servicos.cadastro-sucesso'));
        }

        return redirect()->back()->with('flash-error', config('mensagens.prestadores_servico.cadastro-erro'));
    }

    public function salvar(FormServicoRequest $request)
    {
        $prestadorServico = PrestadorServico::find($request->input('prestador'));

        if ($request->isUpdate()) {
            $servico = Servico::find($request->get('servico_id'));
            $servico->fill($request->input());
        } else {
            $servico = new Servico($request->input());
            $servico->condominio()->associate(Auth::user()->condominio);
        }

        $servico->prestador_servico()->associate($prestadorServico);

        if ($servico->save()) {
            return redirect()
                ->route('servicos.index')
                ->with('flash-success', config('mensagens.servicos.cadastro-sucesso'));
        }

        return redirect()->back()->with('flash-error', config('mensagens.prestadores_servico.cadastro-erro'));
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

    private function getSelectsPopulate(): array
    {
        $prestadores = PrestadorServico::all()->mapWithKeys(function (PrestadorServico $prestador) {
            return [$prestador->getId() => $prestador->nome];
        });

        return compact('prestadores');
    }
}