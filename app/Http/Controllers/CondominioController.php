<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormCadastroCondominioRequest;
use App\Models\Condominio;
use App\Models\Endereco\Cidade;
use App\Models\Endereco\Estado;
use App\Models\Usuario;

class CondominioController extends Controller
{
    public function cadastro()
    {
        $estados = Estado::all()->mapWithKeys(function (Estado $estado) {
            return [$estado->getId() => $estado->nome];
        });
        $cidades = Cidade::all()->mapWithKeys(function (Cidade $cidade) {
            return [$cidade->getId() => $cidade->nome];
        });

        return view('condominio.cadastro', compact('estados', 'cidades'));
    }

    public function salvar(FormCadastroCondominioRequest $request)
    {
        /** @var Cidade $cidade */
        $cidade = Cidade::find($request->input('cidade_id'));

        $condominio = new Condominio([
            'nome' => $request->input('nome_condominio'),
            'ativo' => true
        ]);
        $condominio->cidade()->associate($cidade);

        if ($condominio->save()) {
            $sindico = new Usuario([
                'nome' => $request->input('nome_sindico'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
                'ativo' => true,
                'numero_apartamento' => $request->input('numero_apartamento'),
                'bloco' => $request->input('bloco', null),
            ]);

            $sindico->funcao = Usuario::SINDICO;
            $sindico->condominio()->associate($condominio);

            if ($sindico->save()) {
                dd($sindico);
                return redirect()->route('login');
            }
        }

        return redirect()
            ->back()
            ->with('flash-error', config('mensagens.cadastro-condominio.cadastro-erro'));
    }
}