<?php

use App\Models\Usuario;
use App\Models\Reuniao\Comentario;
use Illuminate\Database\Seeder;

class ComentariosSeeder extends Seeder
{
    public function run()
    {
        $comentarios = [
            "Devemos pensar melhor no que estamos tentando resolver aqui.",
            "Acho uma grande falta de escolha do sídico opinar isso!",
            "A vizinha de baixa nao para de fazer barulho!",
            "Inacreditável",
            "Discordo em condordar com esta pauta",
            "Infelizmente não tempos escolha...",
            "Creio que esse assunto seja melhor debatido pessoalmente com as pessoas envolvidas",
            "Acho ótimo!"
        ];

        foreach ($comentarios as $descricao) {
            $comentario = new Comentario([
                'descricao' => $descricao
            ]);

            $usuario = Usuario::where('funcao', Usuario::MORADOR)->get()->random();

            $reuniao = $usuario->condominio->reunioes->random();
            $pauta = $reuniao->pautas->random();

            $comentario->usuario()->associate($usuario);
            $comentario->pauta()->associate($pauta);

            $comentario->save();
        }
    }
}