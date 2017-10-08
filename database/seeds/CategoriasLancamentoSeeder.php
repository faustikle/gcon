<?php

use App\Models\Financeiro\CategoriaLancamento;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CategoriasLancamentoSeeder extends Seeder
{
    public function run()
    {
        $categorias = [
            'Taxa de condomínio',
            'Água',
            'Energia',
            'Internet',
            'Material de limpeza',
            'Material de escritório',
            'Serviço'
        ];

        DB::beginTransaction();

        foreach ($categorias as $categoria) {
            $categoriaObjeto = new CategoriaLancamento([
                'descricao' => $categoria,
            ]);

            $categoriaObjeto->save();
        }

        DB::commit();
    }
}