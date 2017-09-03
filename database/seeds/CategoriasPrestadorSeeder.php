<?php

use Illuminate\Database\Seeder;
use App\Models\Servico\CategoriaPrestador;

final class CategoriasPrestadorSeeder extends Seeder
{
    public function run()
    {
        CategoriaPrestador::create(['descricao' => 'Pintor']);
        CategoriaPrestador::create(['descricao' => 'Jardineiro']);
        CategoriaPrestador::create(['descricao' => 'Eletricista']);
        CategoriaPrestador::create(['descricao' => 'Encanador']);
        CategoriaPrestador::create(['descricao' => 'Zelador']);
        CategoriaPrestador::create(['descricao' => 'Marceneiro']);
        CategoriaPrestador::create(['descricao' => 'Pedreiro']);
    }
}
