<?php

namespace App\Http\Controllers;

use App\Models\Pauta;
use App\Models\Usuario;
use App\Models\Voto;
use Illuminate\Support\Facades\Auth;

class VotoController extends Controller
{
    public function votarAFavor(Pauta $pauta)
    {
        $this->authorize('votar', $pauta);

        return $this->votar($pauta, true);
    }

    public function votarContra(Pauta $pauta)
    {
        $this->authorize('votar', $pauta);

        return $this->votar($pauta, false);
    }

    private function votar(Pauta $pauta, bool $voto)
    {
        /** @var Usuario $usuario */
        $usuario = Auth::user();

        if (!$pauta->reuniao->aberta) {
            return redirect()->back()->with('flash-error', 'Não é permitida votação nesta pauta agora!');
        }

        if ($usuario->jaVotou($pauta)) {
            return redirect()->back()->with('flash-error', 'Você ja votou nesta pauta!');
        }

        $voto = new Voto(['voto' => $voto]);

        $voto->usuario()->associate($usuario);
        $voto->pauta()->associate($pauta);

        if (!$voto->save()) {
            return redirect()->back()->with('flash-error', 'Erro ao salvar votação!');
        }

        return redirect()->back()->with('flash-success', 'Votação realizada!');
    }
}