<?php

use App\Models\Usuario;
use App\Models\Condominio;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    public function run()
    {
        $condominio = new Condominio([
            'nome' => 'Condominio Parque das Araras',
            'ativo' => true
        ]);
        $condominio->save();

        $administador = new Usuario([
            'nome' => 'Administrador',
            'email' => 'faustikle@gmail.com',
            'password' => bcrypt('123'),
            'ativo' => true,
            'ultimo_acesso' => Carbon::today(),
            'funcao' => Usuario::ADMINISTRADOR
        ]);

        $sindico = new Usuario([
            'nome' => 'Joao Paulo',
            'email' => 'sindico@gmail.com',
            'password' => bcrypt('123'),
            'ativo' => true,
            'numero_apartamento' => '102',
            'bloco' => 'A',
            'ultimo_acesso' => Carbon::today(),
            'funcao' => Usuario::SINDICO
        ]);

        $morador = new Usuario([
            'nome' => 'Paulo Gustavo',
            'email' => 'morador@gmail.com',
            'password' => bcrypt('123'),
            'ativo' => true,
            'numero_apartamento' => '100',
            'bloco' => 'A',
            'ultimo_acesso' => Carbon::today(),
            'funcao' => Usuario::MORADOR
        ]);

        $condominio->usuarios()->saveMany([
            $administador, $sindico, $morador
        ]);
    }
}