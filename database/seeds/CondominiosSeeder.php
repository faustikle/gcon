<?php

use App\Models\Condominio;
use App\Models\Endereco\Cidade;
use Illuminate\Database\Seeder;

class CondominiosSeeder extends Seeder
{
    public function run()
    {
        $cidade = Cidade::find(2655);

        $condominio = new Condominio([
            'nome' => 'Condominio dos Fakers',
            'ativo' => true
        ]);

        $condominio->cidade()->associate($cidade);
        $condominio->save();
    }
}