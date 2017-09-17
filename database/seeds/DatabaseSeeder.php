<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(EstadosSeeder::class);
         $this->call(CidadesSeeder::class);
         $this->call(CategoriasPrestadorSeeder::class);
         $this->call(PrestadoresServicoSeeder::class);
         $this->call(CondominiosSeeder::class);
         $this->call(AvaliacoesPrestadorSeeder::class);
         $this->call(ServicosSeeder::class);
         $this->call(ReunioesSeeder::class);
         $this->call(UsuariosSeeder::class);
         $this->call(ComentariosSeeder::class);
         $this->call(OcorrenciasSeeder::class);
    }
}
