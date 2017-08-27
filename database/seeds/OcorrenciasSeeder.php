<?php

use Illuminate\Database\Seeder;
use App\Models\Condominio;
use App\Models\Ocorrencia;
use App\Models\Usuario;

final class OcorrenciasSeeder extends Seeder
{
    public function run()
    {
        $condominio = Condominio::where('nome', 'Condominio dos Fakers')->first();

        $ocorrencias = [
            [
                'titulo' => 'Muito baruto depois das 22h',
                'descricao' => 'A senhorita Claudia do apartamento 12, bloco c, está fazendo muito barulho todas as sextas, eu e meu marido não aguentamos mais!',
                'reclamada' => 'Apartamento 12 BLOCO C'
            ],
            [
                'titulo' => 'Goteira no quarto',
                'descricao' => 'Senhor sindico, existe uma goteira vinda do vizinho de cima, que está molhando todo o meu quarto. Aguardo resolução imediata.',
                'reclamada' => 'AP 12 BLOCO C'
            ],
            [
                'titulo' => 'Vazamento de cano',
                'descricao' => 'Acho que estourou um cano no vizinho de cima, pois esta pingando agua em cima da minha cama.. tudo molhado!! Vou ter que jogar o colchão fora!!',
                'reclamada' => 'ap 07 - C'
            ],
            [
                'titulo' => 'Falta de agua',
                'descricao' => 'Está ocorrêndo faltas constantes de agua à 2 meses!',
                'reclamada' => null
            ],
            [
                'titulo' => 'Cachorro latindo o dia inteiro',
                'descricao' => 'Tem uma shitzu preta no apartamento de baixo, que fica o dia todo latindo, depois que os donos saem.',
                'reclamada' => '13 bloco A'
            ],
        ];

        foreach($ocorrencias as $ocorrencia) {
            $ocorrenciaObjeto = new Ocorrencia([
                'titulo' => $ocorrencia['titulo'],
                'descricao' => $ocorrencia['descricao'],
                'reclamada' => $ocorrencia['reclamada'],
            ]);

            $usuario = Usuario::where('funcao', Usuario::MORADOR)->get()->random();

            $ocorrenciaObjeto->condominio()->associate($condominio);
            $ocorrenciaObjeto->usuario()->associate($usuario);

            $ocorrenciaObjeto->save();
        }
    }
}
