<?php

namespace App\Http\Controllers;

use App\Models\Reuniao\Comentario;
use App\Models\Reuniao\Pauta;
use App\Models\Usuario;
use App\Models\Reuniao\Voto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VotoController extends Controller
{
    public function votarAFavor(Request $request, Pauta $pauta)
    {
        $this->authorize('votar', $pauta);

        return $this->votar($pauta, true, $request->get('comentario'));
    }

    public function votarContra(Request $request, Pauta $pauta)
    {
        $this->authorize('votar', $pauta);

        return $this->votar($pauta, false, $request->get('comentario'));
    }

    private function votar(Pauta $pauta, bool $voto, string $comentario = null)
    {
        /** @var Usuario $usuario */
        $usuario = Auth::user();

        if (!$pauta->reuniao->aberta) {
            return redirect()->back()->with('flash-error', config('mensagens.votacao.reuniao-nao-aberta'));
        }

        if ($usuario->jaVotou($pauta)) {
            return redirect()->back()->with('flash-error', config('mensagens.votacao.ja-votada'));
        }

        $voto = new Voto(['voto' => $voto]);

        if ($comentario) {
            $comentario = new Comentario(['descricao' => $comentario]);
            $comentario->usuario()->associate($usuario);
            $comentario->pauta()->associate($pauta);
            $comentario->save();
        }

        $voto->usuario()->associate($usuario);
        $voto->pauta()->associate($pauta);

        if ($voto->save()) {
            return redirect()->back()->with('flash-success', config('mensagens.votacao.sucesso'));
        }

        return redirect()->back()->with('flash-error', config('mensagens.votacao.erro'));
    }
}