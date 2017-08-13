<?php

namespace App\Http\Controllers;

use App\Models\Reuniao;
use Illuminate\Support\Facades\Auth;

class ReuniaoController extends Controller
{
    public function index()
    {
        $this->authorize('reunioes.listar');

        $reunioes = Reuniao::porUsuario(Auth::user())->get();

        return view('reuniao.index', compact('reunioes'));
    }

    public function visualizar(Reuniao $reuniao)
    {
        $this->authorize('reunioes.visualizar');
//        dd($reuniao->pautas()->get());
        return view('reuniao.visualizar', compact('reuniao'));
    }
}