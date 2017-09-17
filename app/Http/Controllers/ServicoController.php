<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormServicoRequest;
use App\Models\Servico\Servico;
use Illuminate\Support\Facades\Auth;

class ServicoController extends Controller
{
    public function index()
    {
        $servicos = Servico::porUsuario(Auth::user())->get();
    }

    public function index_compartilhados()
    {
        $servicos = Servico::all()->get();
    }

    public function visualizar(Servico $servico)
    {
    }

    public function cadastrar()
    {
    }

    public function editar(Servico $servico)
    {
    }

    public function salvar(FormServicoRequest $request)
    {
    }

    public function excluir(Servico $servico)
    {
    }
}