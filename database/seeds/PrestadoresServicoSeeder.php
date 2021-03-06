<?php

use Illuminate\Database\Seeder;
use App\Models\Servico\PrestadorServico;
use Illuminate\Support\Facades\DB;
use App\Models\Endereco\Cidade;
use App\Models\Servico\CategoriaPrestador;
use App\Models\Servico\PrestadorCategoria;
use Faker\Factory;

final class PrestadoresServicoSeeder extends Seeder
{
    public function run()
    {
        $cidade = Cidade::find(2655);
        $faker = Factory::create('pt_BR');

        DB::beginTransaction();

        for ($i = 0; $i <= 30; $i++) {
            $prestador = new PrestadorServico([
                'nome' => $faker->name,
                'responsavel' => $faker->name,
                'telefone' => '83'. (string) $faker->numberBetween(8000, 9999) . (string) $faker->numberBetween(8000, 9999),
                'celular' => '839'. (string) $faker->numberBetween(8000, 9999) . (string) $faker->numberBetween(8000, 9999),
                'cpf' => $faker->cpf(false),
                'cnpj' => $faker->cnpj(false),
                'endereco' => $faker->streetName,
                'numero' => (string) mt_rand(100, 500),
                'bairro' => $faker->words(mt_rand(1, 3), true),
                'cep' => str_replace('-', '', $faker->postcode)
            ]);

            $prestador->cidade()->associate($cidade);
            $prestador->save();

            $categoria = CategoriaPrestador::all()->random();

            $prestadorCategoria = new PrestadorCategoria();
            $prestadorCategoria->prestador_servico_id = $prestador->getId();
            $prestadorCategoria->categoria_prestador_id = $categoria->getId();

            $prestadorCategoria->save();
        }
        DB::commit();
    }
}
