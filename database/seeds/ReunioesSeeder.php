<?php

use App\Models\Reuniao;
use App\Models\Condominio;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ReunioesSeeder extends Seeder
{
    public function run()
    {
        $condominio = Condominio::where('nome', 'Condominio dos Fakers')->first();

        $titulosReunioes = [
            'Reunião extraordinaria 1',
            'Reunião extraordinaria 2',
            'Reunião extraordinaria 3',
            'Reunião extraordinaria 4',
        ];

        foreach ($titulosReunioes as $titulo) {
            $reuniao = new Reuniao([
                'titulo' => $titulo,
                'data_abertura' => Carbon::now(),
                'data_encerramento' => Carbon::now()->addDays(30),
            ]);

            $condominio->reunioes()->save($reuniao);
        }
    }
}