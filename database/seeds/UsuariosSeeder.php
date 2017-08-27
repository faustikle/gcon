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

        $moradores = [
            new Usuario([
                'nome' => 'Paulo Gustavo',
                'email' => 'morador@gmail.com',
                'password' => bcrypt('123'),
                'ativo' => true,
                'numero_apartamento' => '14',
                'bloco' => 'A',
                'ultimo_acesso' => Carbon::today(),
                'funcao' => Usuario::MORADOR
            ]),
            new Usuario([
                'nome' => 'MAtheus de Souza',
                'email' => 'morador2@gmail.com',
                'password' => bcrypt('123'),
                'ativo' => true,
                'numero_apartamento' => '6',
                'bloco' => 'C',
                'ultimo_acesso' => Carbon::today(),
                'funcao' => Usuario::MORADOR
            ]),
            new Usuario([
                'nome' => 'Carla da Costa Braga',
                'email' => 'morador3@gmail.com',
                'password' => bcrypt('123'),
                'ativo' => true,
                'numero_apartamento' => '7',
                'bloco' => 'C',
                'ultimo_acesso' => Carbon::today(),
                'funcao' => Usuario::MORADOR
            ]),
            new Usuario([
                'nome' => 'Antonio Filipo',
                'email' => 'morador4@gmail.com',
                'password' => bcrypt('123'),
                'ativo' => true,
                'numero_apartamento' => '12',
                'bloco' => 'A',
                'ultimo_acesso' => Carbon::today(),
                'funcao' => Usuario::MORADOR
            ]),
        ];

        $administador->condominio()->associate($condominio)->save();
        $sindico->condominio()->associate($condominio)->save();

        foreach ($moradores as $morador) {
            $morador->condominio()->associate($condominio)->save();
        }
    }
}