<?php

namespace App\Http\Controllers;

use App\Models\Condominio;
use App\Models\Financeiro\FluxoDeCaixa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

final class BalanceteController extends Controller
{
    public function index(Request $request)
    {
        /** @var Condominio $condominioUsuario */
        $condominioUsuario = Auth::user()->condominio;
        $fluxosCaixa = $condominioUsuario
            ->fluxos_de_caixa()
            ->get()
            ->filter(
            function (FluxoDeCaixa $fluxoDeCaixa) {
                return $fluxoDeCaixa->isFechado();
            }
        );

        $parametros = [
            'fluxosCaixa' => $fluxosCaixa
        ];

        if ($request->has('mes-referencia')) {
            $balancete = FluxoDeCaixa::find($request->get('mes-referencia'));
            $parametros['balancete'] = $balancete;
        }

        if ($request->has('tipo')) {
            $parametros['tipo'] = $request->get('tipo');
        }

        return view('balancete.index', $parametros);
    }
}
