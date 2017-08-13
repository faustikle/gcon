<?php

namespace App\Http\Controllers;

use App\Models\Reuniao;

class ReuniaoController extends Controller
{
    public function index()
    {
        $this->authorize('reunioes.listar');

        $reunioes = Reuniao::with('condominio')->get();

        return view('reuniao.index', compact('reunioes'));
    }
}