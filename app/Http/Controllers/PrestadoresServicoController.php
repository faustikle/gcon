<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormPrestadorServicoRequest;
use App\Models\Endereco\Cidade;
use App\Models\Endereco\Estado;
use App\Models\Servico\CategoriaPrestador;
use App\Models\Servico\PrestadorCategoria;
use App\Models\Servico\PrestadorServico;

final class PrestadoresServicoController extends Controller
{
    public function index()
    {
        $prestadores = PrestadorServico::all();

        return view('prestador-servico.index', compact('prestadores'));
    }

    public function cadastrar()
    {
        return view('prestador-servico.cadastro', $this->getSelectsPopulate());
    }

    public function editar(PrestadorServico $prestador)
    {
        return view('prestador-servico.cadastro', array_merge($this->getSelectsPopulate(), compact('prestador')));
    }

    public function salvar(FormPrestadorServicoRequest $request)
    {
        $categorias = CategoriaPrestador::whereIn(
            'categoria_prestador_id',
            $request->input('categorias')
        )->get();
        $cidade = Cidade::find($request->input('cidade'));

        if ($request->isUpdate()) {
            $prestador = PrestadorServico::find($request->get('prestador_servico_id'));
            $prestador->fill($request->input());

            $prestador->deletarCategoriasNaoSelecionadas($categorias);
        } else {
            $prestador = new PrestadorServico($request->input());
        }

        $prestador->cidade()->associate($cidade);

        if ($prestador->save()) {
            foreach ($categorias as $categoria) {
                if (!$prestador->hasCategoria($categoria)) {
                    $prestadorCategoria = new PrestadorCategoria();
                    $prestadorCategoria->prestador_servico_id = $prestador->getId();
                    $prestadorCategoria->categoria_prestador_id = $categoria->getId();

                    if (!$prestadorCategoria->save()) {
                        $prestador->delete();
                    }
                }
            }

            if ($prestador->exists()) {
                return redirect()
                    ->route('prestadores.index')
                    ->with('flash-success', config('mensagens.prestadores_servico.cadastro-sucesso'));
            }
        }

        return redirect()->back()->with('flash-error', config('mensagens.prestadores_servico.cadastro-erro'));
    }

    public function visualizar(PrestadorServico $prestador)
    {
        return view('prestador-servico.visualizar', compact('prestador'));
    }

    public function excluir(PrestadorServico $prestador)
    {
        $this->authorize('excluir', $prestador);

        if ($prestador->delete()) {
            return redirect()
                ->route('prestadores.index')
                ->with('flash-success', config('mensagens.prestadores_servico.excluir-sucesso'));
        }

        return redirect()
            ->back()
            ->with('flash-error', config('mensagens.prestadores_servico.excluir-erro'));
    }

    private function getSelectsPopulate(): array
    {
        $estados = Estado::all()->mapWithKeys(function (Estado $estado) {
            return [$estado->getId() => $estado->nome];
        });
        $cidades = Cidade::all()->mapWithKeys(function (Cidade $cidade) {
            return [$cidade->getId() => $cidade->nome];
        });
        $categorias = CategoriaPrestador::all()->mapWithKeys(function (CategoriaPrestador $categoria) {
            return [$categoria->getId() => $categoria->descricao];
        });

        return compact('estados', 'cidades', 'categorias');
    }
}
