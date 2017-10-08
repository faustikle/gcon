<?php

namespace App\Http\Controllers;

use App\Models\Condominio;
use App\Models\Financeiro\FluxoDeCaixa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FluxoDeCaixaController extends Controller
{
    public function index()
    {
        /** @var Condominio $condominioUsuario */
        /** @var FluxoDeCaixa $fluxoCaixaAtual */
        $condominioUsuario = Auth::user()->condominio;
        $fluxoCaixaAtual = $condominioUsuario->possuiFluxoCaixaAberto()
                ? $condominioUsuario->getFluxoAtual()
                : null;

        return view('fluxo-caixa.index', compact('fluxoCaixaAtual'));
    }

    public function iniciar()
    {
        /** @var Condominio $condominioUsuario */
        $condominioUsuario = Auth::user()->condominio;

        if ($condominioUsuario->possuiFluxoCaixaAberto()) {
            return redirect()
                ->route('fluxo-caixa.index')
                ->with('flash-error', config('mensagens.fluxo-caixa.ja-iniciado'));
        }

        $fluxoCaixa = new FluxoDeCaixa([
            'saldo_inicial' => 0
        ]);
        $fluxoCaixa->condominio()->associate($condominioUsuario);

        if (!$fluxoCaixa->save()) {
            return redirect()
                ->route('fluxo-caixa.index')
                ->with('flash-error', config('mensagens.fluxo-caixa.iniciar-erro'));
        }

        $condominioUsuario->fluxo_de_caixa_id = $fluxoCaixa->getId();

        if (!$condominioUsuario->save()) {
            return redirect()
                ->route('fluxo-caixa.index')
                ->with('flash-error', config('mensagens.fluxo-caixa.iniciar-erro'));
        }

        return redirect()
            ->route('fluxo-caixa.index')
            ->with('flash-success', config('mensagens.fluxo-caixa.iniciar-sucesso'));
    }

    public function fechar()
    {
        /** @var Condominio $condominioUsuario */
        $condominioUsuario = Auth::user()->condominio;

        if (!$condominioUsuario->possuiFluxoCaixaAberto()) {
            return redirect()
                ->route('fluxo-caixa.index')
                ->with('flash-error', config('mensagens.fluxo-caixa.nao-iniciado'));
        }

        $condominioUsuario->fluxo_de_caixa_id = null;

        if (!$condominioUsuario->save()) {
            return redirect()
                ->route('fluxo-caixa.index')
                ->with('flash-error', config('mensagens.fluxo-caixa.fechar-erro'));
        }

        return redirect()
            ->route('fluxo-caixa.index')
            ->with('flash-success', config('mensagens.fluxo-caixa.fechar-sucesso'));
    }
}
