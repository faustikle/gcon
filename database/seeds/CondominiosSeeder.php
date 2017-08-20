<?php

use App\Models\Condominio;
use Illuminate\Database\Seeder;

class CondominiosSeeder extends Seeder
{
    public function run()
    {
        $condominio = new Condominio([
            'nome' => 'Condominio dos Fakers',
            'ativo' => true
        ]);

        $condominio->save();
    }
}