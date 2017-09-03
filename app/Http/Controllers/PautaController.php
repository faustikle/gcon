<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormPautaRequest;
use App\Models\Reuniao\Pauta;
use App\Models\Reuniao\Reuniao;

final class PautaController extends Controller
{
    public function cadastrar(Reuniao $reuniao)
    {
        $this->authorize('addPauta', $reuniao);

        return view('pauta.cadastro', compact('reuniao'));
    }

    public function editar(Reuniao $reuniao, Pauta $pauta)
    {
        $this->authorize('editar', $pauta);

        return view('pauta.cadastro', compact('reuniao', 'pauta'));
    }
//
    public function salvar(FormPautaRequest $request, Reuniao $reuniao)
    {
        $this->authorize('addPauta', $reuniao);

        if ($request->isUpdate()) {
            $pauta = Pauta::find($request->get('pauta_id'));
            $pauta->fill($request->input());
        } else {
            $pauta = new Pauta($request->input());
            $pauta->reuniao()->associate($reuniao);
        }

        if ($pauta->save()) {
            return redirect()
                ->route('reuniao.editar', $reuniao->reuniao_id)
                ->with('flash-success', config(
                    'mensagens.pauta.cadastro-sucesso'
                ));
        }

        return redirect()->back()->with('flash-error', config('mensagens.pauta.cadastro-erro'));
    }

    public function excluir(Pauta $pauta)
    {
        $this->authorize('excluir', $pauta);

        if ($pauta->delete()) {
            return redirect()
                ->route('reuniao.editar', $pauta->reuniao->reuniao_id)
                ->with('flash-success', config('mensagens.pauta.excluir-sucesso'));
        }

        return redirect()
            ->back()
            ->with('flash-error', config('mensagens.pauta.excluir-erro'));
    }
}
