<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormCadastroMoradorRequest;
use App\Http\Requests\FormConviteMoradorRequest;
use App\Mail\ConviteMorador;
use App\Models\Convite;
use App\Models\Usuario;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MoradorController extends Controller
{
    public function index()
    {
        $moradores = Usuario::porUsuario(Auth::user())->get();

        return view('morador.index', compact('moradores'));
    }

    public function excluir(Usuario $usuario)
    {

    }

    public function adicionar()
    {
        return view('morador.enviar-convite', compact('moradores'));
    }

    public function convidar(FormConviteMoradorRequest $request)
    {
        $convite = new Convite([
            'email' => $request->input('email'),
            'nome' => $request->input('nome'),
            'numero_apartamento' => $request->input('numero_apartamento'),
            'bloco' => $request->input('bloco'),
            'token' => str_random(40),
            'created_at' => Carbon::now()
        ]);

        $convite->condominio()->associate(Auth::user()->condominio);

        if ($convite->save()) {
            $email = new ConviteMorador(Auth::user(), $convite);

            Mail::to($convite->email)->send($email);

            return redirect()
                ->route('moradores.index')
                ->with('flash-success', config('mensagens.convite-morador.cadastro-sucesso'));
        }

        return redirect()
            ->route('moradores.index')
            ->with('flash-error', config('mensagens.convite-morador.convite-erro'));
    }

    public function cadastro(string $token)
    {
        /** @var Convite $convite */
        $convite = Convite::where('token', $token)->first();

        if (!$convite) {
            return view('convite.token-invalido', [
                'tipo' => Convite::TOKEN_INVALIDO
            ]);
        }

        if ($convite->isVencido()) {
            $convite->deletar();

            return view('convite.token-invalido', [
                'tipo' => Convite::TOKEN_VENCIDO
            ]);
        }

        return view('convite.cadastro', compact('convite'));
    }

    public function salvar(FormCadastroMoradorRequest $request, string $token)
    {
        /** @var Convite $convite */
        $convite = Convite::where('token', $token)->first();

        if (!$convite || $convite->isVencido()) {
            return redirect()
                ->back()
                ->with('flash-error', config('mensagens.convite-morador.convite-invalido'));
        }

        $morador = new Usuario([
            'nome' => $request->input('nome'),
            'email' => $convite->email,
            'password' => bcrypt($request->input('password')),
            'numero_apartamento' => $convite->numero_apartamento,
            'bloco' => $convite->bloco ?: null,
        ]);
        $morador->funcao = Usuario::MORADOR;
        $morador->condominio()->associate($convite->condominio);

        if ($morador->save()) {
            $convite->deletar();

            return redirect()->route('login');
        }

        return redirect()
            ->back()
            ->with('flash-error', config('mensagens.convite-morador.cadastro-erro'));
    }
}