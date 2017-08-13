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
         $this->call(CondominiosSeeder::class);
         $this->call(ReunioesSeeder::class);
         $this->call(UsuariosSeeder::class);
    }
}
