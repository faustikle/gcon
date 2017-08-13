<?php

namespace App\Http\Controllers;

class ReuniaoController extends Controller
{
    public function index()
    {
        $this->authorize('reunioes.listar');

        $reunioes = [
            [
                'titulo' => 'Reuniao 1',
            ],
            [
                'titulo' => 'Reuniao 2',
            ],
            [
                'titulo' => 'Reuniao 3',
            ],
            [
                'titulo' => 'Reuniao 4',
            ],
            [
                'titulo' => 'Reuniao 5',
            ],

        ];

        return view('reuniao.index', compact('reunioes'));
    }
}