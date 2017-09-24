<?php

use App\Models\Condominio;
use App\Models\Endereco\Cidade;
use Illuminate\Database\Seeder;
use App\Models\Documento;
use Illuminate\Support\Facades\DB;

class CondominiosSeeder extends Seeder
{
    public function run()
    {
        DB::beginTransaction();

        $cidade = Cidade::find(2655);

        $documentos = [
            Documento::create([
                'nome' => 'Planta Baixa',
                'descricao' => 'Planta baixa do condominio.',
                'caminho' => 'http://www.pdf995.com/samples/pdf.pdf',
                'tamanho' => 433994
            ]),
            Documento::create([
                'nome' => 'Projeto Hidraulico',
                'descricao' => 'Projeto hidraulico do condominio.',
                'caminho' => 'http://www.pdf995.com/samples/pdf.pdf',
                'tamanho' => 433994
            ]),
            Documento::create([
                'nome' => 'AVCB',
                'descricao' => 'Auto de Vistoria do Corpo de Bombeiros.',
                'caminho' => 'http://www.pdf995.com/samples/pdf.pdf',
                'tamanho' => 433994
            ]),
        ];

        $condominio = new Condominio([
            'nome' => 'Condominio dos Fakers',
            'ativo' => true
        ]);

        $condominio->cidade()->associate($cidade);

        $condominio->save();

        foreach ($documentos as $documento) {
            $condominio->documentos()->attach($documento);
        }

        DB::commit();
    }
}