<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\Servico\Servico;
use Illuminate\Support\Facades\DB;
use App\Models\Condominio;
use App\Models\Servico\PrestadorServico;

final class ServicosSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create('pt_BR');
        $titulos = [
            'Troca de lampadas',
            'Pintura dos prédios',
            'Troca do motor dos portões',
            'Limpeza das janelas do bloco A',
            'Instalação de cameras',
            'Instalação de cerca elétrica',
            'Manutenção na bomba de agua',
            'Limpeza da caixa de agua',
        ];

        DB::beginTransaction();

        for ($i = 0; $i <= 50; $i++) {
            $condominio = Condominio::all()->random();
            $prestadorServico = PrestadorServico::all()->random();

            $servico = new Servico([
                'titulo' => $titulos[mt_rand(0, count($titulos) - 1)],
                'descricao' => $faker->text(),
                'valor' => $faker->randomFloat(2, 100, 1000),
                'data' => $faker->dateTimeBetween('+1 days', '+30 days')->format('Y-m-d H:i:s')
            ]);

            $servico->condominio()->associate($condominio);
            $servico->prestador_servico()->associate($prestadorServico);

            $servico->save();
        }

        DB::commit();
    }
}
