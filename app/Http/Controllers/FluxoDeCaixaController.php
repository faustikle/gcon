<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FluxoDeCaixaController extends Controller
{
    public function index()
    {
        return view('fluxo-caixa.index');
    }
}
