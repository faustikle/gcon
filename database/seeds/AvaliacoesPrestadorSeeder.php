<?php

use Illuminate\Database\Seeder;
use App\Models\Servico\AvaliacaoPrestador;
use Illuminate\Support\Facades\DB;
use App\Models\Condominio;
use App\Models\Servico\PrestadorCategoria;

final class AvaliacoesPrestadorSeeder extends Seeder
{
    public function run()
    {
        DB::beginTransaction();

        for ($i = 0; $i <= 50; $i++) {
            $condominio = Condominio::all()->random();
            $prestadorCategoria = PrestadorCategoria::all()->random();

            $avaliacao = new AvaliacaoPrestador();
            $avaliacao->avaliacao = mt_rand(0, AvaliacaoPrestador::AVALIACAO_MAXIMA);
            $avaliacao->condominio()->associate($condominio);
            $avaliacao->prestador_categoria()->associate($prestadorCategoria);

            $avaliacao->save();
        }

        DB::commit();
    }
}
