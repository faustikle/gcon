<?php

use App\Models\Usuario;
use App\Models\Condominio;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    public function run()
    {
        $condominio = Condominio::where('nome', 'Condominio dos Fakers')->first();

        $administador = new Usuario([
            'nome' => 'Administrador',
            'email' => 'administrador@gmail.com',
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

        $administador->condominio()->associate($condominio)->save();
        $sindico->condominio()->associate($condominio)->save();
        $morador->condominio()->associate($condominio)->save();
    }
}