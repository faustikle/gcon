<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormLancamentoRequest;
use App\Models\Condominio;
use App\Models\Financeiro\FluxoDeCaixa;
use App\Models\Financeiro\Lancamento;
use Illuminate\Support\Facades\Auth;

class LancamentoController extends Controller
{
    public function salvar(FormLancamentoRequest $request, FluxoDeCaixa $fluxoCaixa)
    {
        /** @var Condominio $condominioUsuario */
        $condominioUsuario = Auth::user()->condominio;

        if (!$condominioUsuario->fluxoCaixaAtivo($fluxoCaixa)) {
            return redirect()
                ->route('fluxo-caixa.index')
                ->with('flash-error', config('mensagens.lancamento.fluxo-caixa-fechado'));
        }

        $lancamento = new Lancamento($request->inputs());
        $lancamento->fluxo_de_caixa()->associate($fluxoCaixa);
        $lancamento->categoria_lancamento_id = $request->getCategoria()->getId();

        if (!$lancamento->save()) {
            return redirect()
                ->route('fluxo-caixa.index')
                ->with('flash-error', config('mensagens.lancamento.erro'));
        }

        return redirect()
            ->route('fluxo-caixa.index')
            ->with('flash-success', config('mensagens.lancamento.sucesso'));
    }
}
