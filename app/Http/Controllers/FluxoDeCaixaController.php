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
        $fluxoCaixaAtual = $condominioUsuario->fluxo_de_caixa_atual;

        return view('fluxo-caixa.index', compact('fluxoCaixaAtual'));
    }
}
