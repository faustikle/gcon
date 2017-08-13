<?php

use App\Models\Reuniao;
use App\Models\Condominio;
use App\Models\Pauta;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ReunioesSeeder extends Seeder
{
    public function run()
    {
        $condominio = Condominio::where('nome', 'Condominio dos Fakers')->first();

        $reunioes = [
            [
                'titulo' => 'Reunião extraordinaria 1',
                'pautas' => [
                    'Troca das lampadas',
                    'Pintura do prédio',
                    'Mudanca do sindico'
                ]
            ],
            [
                'titulo' => 'Reunião extraordinaria 2',
                'pautas' => [
                    'Trocar a agua da piscina',
                    'Pintura da quadra de tenis'
                ]
            ],
            [
                'titulo' => 'Reunião extraordinaria 3',
                'pautas' => [
                    'Mudanca dos funcionarios',
                    'Compra de uma bola coletiva'
                ]
            ],
            [
                'titulo' => 'Reunião extraordinaria 4',
                'pautas' => [
                    'Festa de natal',
                    'Compra de PS4 coletivo'
                ]
            ],
        ];

        foreach ($reunioes as $reuniao) {
            $reuniaoObjeto = new Reuniao([
                'titulo' => $reuniao['titulo'],
                'data_abertura' => Carbon::now(),
                'data_encerramento' => Carbon::now()->addDays(30),
            ]);

            $reuniaoObjeto->condominio()->associate($condominio);
            $reuniaoObjeto->save();

            foreach ($reuniao['pautas'] as $pauta) {
                $pautaObjeto = new Pauta([
                    'titulo' => $pauta,
                    'descricao' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ut viverra risus. Vestibulum quis justo non felis aliquam scelerisque at varius lectus. Etiam a augue rutrum, tincidunt mi nec, hendrerit sem. Duis rhoncus nec ante a dapibus. Proin et eros eget risus rutrum pulvinar sit amet sit amet metus. Aenean id libero aliquam, molestie lectus nec, varius nunc. In ut fermentum elit. Curabitur vestibulum lorem mauris, at feugiat erat fermentum quis. In id porttitor odio, non congue tellus.'
                ]);

                $pautaObjeto->reuniao()->associate($reuniaoObjeto);
                $pautaObjeto->save();
            }
        }
    }
}