<?php

use App\Models\Usuario;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    public function run()
    {
        Usuario::create([
            'nome' => 'Administrador',
            'email' => 'faustikle@gmail.com',
            'password' => bcrypt('123'),
            'ativo' => true,
            'ultimo_acesso' => Carbon::today(),
            'funcao' => Usuario::ADMINISTRADOR
        ]);

        Usuario::create([
            'nome' => 'Joao Paulo',
            'email' => 'sindico@gmail.com',
            'password' => bcrypt('123'),
            'ativo' => true,
            'ultimo_acesso' => Carbon::today(),
            'funcao' => Usuario::SINDICO
        ]);

        Usuario::create([
            'nome' => 'Paulo Gustavo',
            'email' => 'morador@gmail.com',
            'password' => bcrypt('123'),
            'ativo' => true,
            'ultimo_acesso' => Carbon::today(),
            'funcao' => Usuario::MORADOR
        ]);
    }
}