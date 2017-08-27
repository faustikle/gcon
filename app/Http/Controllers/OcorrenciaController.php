<?php

namespace App\Http\Controllers;

use App\Models\Ocorrencia;
use Illuminate\Support\Facades\Auth;

class OcorrenciaController extends Controller
{
    public function index()
    {
        $ocorrencias = Ocorrencia::porUsuario(Auth::user())
            ->orderBy('created_at', 'asc')
            ->orderBy('resolvido', 'asc')
            ->get();

        return view('ocorrencia.index', compact('ocorrencias'));
    }

    public function visualizar(Ocorrencia $ocorrencia)
    {
//        return view('reuniao.visualizar', compact('reuniao'));
    }

    public function resolver(Ocorrencia $ocorrencia)
    {
        $this->authorize('resolver', $ocorrencia);

        $ocorrencia->resolver();

        if ($ocorrencia->save()) {
            return redirect()
                ->route('ocorrencia.index')
                ->with('flash-success', config('mensagens.ocorrencia.resolvida-sucesso'));

        }

        return redirect()->back()->with('flash-error', config('mensagens.ocorrencia.resolvida-erro'));
    }
//
//    public function cadastrar()
//    {
//        return view('reuniao.cadastro');
//    }
//
//    public function editar(Reuniao $reuniao)
//    {
//        $this->authorize('editar', $reuniao);
//
//        return view('reuniao.cadastro', compact('reuniao'));
//    }
//
//    public function salvar(FormReuniaoRequest $request)
//    {
//        if ($request->isUpdate()) {
//            $reuniao = Reuniao::find($request->get('reuniao_id'));
//            $reuniao->fill($request->input());
//        } else {
//            $condominio = Auth::user()->condominio;
//            $reuniao = new Reuniao($request->input());
//            $reuniao->condominio()->associate($condominio);
//        }
//
//        if ($reuniao->save()) {
//            return redirect()
//                ->route('reuniao.index')
//                ->with('flash-success', config('mensagens.reuniao.cadastro-sucesso'));
//        }
//
//        return redirect()->back()->with('flash-error', config('mensagens.reuniao.cadastro-erro'));
//    }
//
//    public function excluir(Reuniao $reuniao)
//    {
//        $this->authorize('excluir', $reuniao);
//
//        if ($reuniao->delete()) {
//            return redirect()
//                ->route('reuniao.index')
//                ->with('flash-success', config('mensagens.reuniao.excluir-sucesso'));
//        }
//
//        return redirect()
//            ->back()
//            ->with('flash-error', config('mensagens.reuniao.excluir-erro'));
//    }
}