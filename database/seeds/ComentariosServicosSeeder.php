<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Usuario;
use App\Models\Servico\Servico;
use App\Models\Servico\ComentarioServico;
use Faker\Factory;

final class ComentariosServicosSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create('pt_BR');

        DB::beginTransaction();

        for ($i = 0; $i <= 100; $i++) {
            $usuario = Usuario::all()->random();
            $servico = Servico::all()->random();

            $comentario = new ComentarioServico(['comentario' => $faker->text(),]);
            $comentario->usuario()->associate($usuario);
            $comentario->servico()->associate($servico);

            $comentario->save();
        }

        DB::commit();
    }
}
