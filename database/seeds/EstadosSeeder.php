<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadosSeeder extends Seeder
{
    public function run()
    {
        DB::insert('insert into estados (estado_id, nome, uf) values(?, ?, ?)', [1, 'Acre', 'AC']);
        DB::insert('insert into estados (estado_id, nome, uf) values(?, ?, ?)', [2, 'Alagoas', 'AL']);
        DB::insert('insert into estados (estado_id, nome, uf) values(?, ?, ?)', [3, 'Amazonas', 'AM']);
        DB::insert('insert into estados (estado_id, nome, uf) values(?, ?, ?)', [4, 'Amapá', 'AP']);
        DB::insert('insert into estados (estado_id, nome, uf) values(?, ?, ?)', [5, 'Bahia', 'BA']);
        DB::insert('insert into estados (estado_id, nome, uf) values(?, ?, ?)', [6, 'Ceará', 'CE']);
        DB::insert('insert into estados (estado_id, nome, uf) values(?, ?, ?)', [7, 'Distrito Federal', 'DF']);
        DB::insert('insert into estados (estado_id, nome, uf) values(?, ?, ?)', [8, 'Espírito Santo', 'ES']);
        DB::insert('insert into estados (estado_id, nome, uf) values(?, ?, ?)', [9, 'Goiás', 'GO']);
        DB::insert('insert into estados (estado_id, nome, uf) values(?, ?, ?)', [10, 'Maranhão', 'MA']);
        DB::insert('insert into estados (estado_id, nome, uf) values(?, ?, ?)', [11, 'Minas Gerais', 'MG']);
        DB::insert('insert into estados (estado_id, nome, uf) values(?, ?, ?)', [12, 'Mato Grosso do Sul', 'MS']);
        DB::insert('insert into estados (estado_id, nome, uf) values(?, ?, ?)', [13, 'Mato Grosso', 'MT']);
        DB::insert('insert into estados (estado_id, nome, uf) values(?, ?, ?)', [14, 'Pará', 'PA']);
        DB::insert('insert into estados (estado_id, nome, uf) values(?, ?, ?)', [15, 'Paraíba', 'PB']);
        DB::insert('insert into estados (estado_id, nome, uf) values(?, ?, ?)', [16, 'Pernambuco', 'PE']);
        DB::insert('insert into estados (estado_id, nome, uf) values(?, ?, ?)', [17, 'Piauí', 'PI']);
        DB::insert('insert into estados (estado_id, nome, uf) values(?, ?, ?)', [18, 'Paraná', 'PR']);
        DB::insert('insert into estados (estado_id, nome, uf) values(?, ?, ?)', [19, 'Rio de Janeiro', 'RJ']);
        DB::insert('insert into estados (estado_id, nome, uf) values(?, ?, ?)', [20, 'Rio Grande do Norte', 'RN']);
        DB::insert('insert into estados (estado_id, nome, uf) values(?, ?, ?)', [21, 'Rondônia', 'RO']);
        DB::insert('insert into estados (estado_id, nome, uf) values(?, ?, ?)', [22, 'Roraima', 'RR']);
        DB::insert('insert into estados (estado_id, nome, uf) values(?, ?, ?)', [23, 'Rio Grande do Sul', 'RS']);
        DB::insert('insert into estados (estado_id, nome, uf) values(?, ?, ?)', [24, 'Santa Catarina', 'SC']);
        DB::insert('insert into estados (estado_id, nome, uf) values(?, ?, ?)', [25, 'Sergipe', 'SE']);
        DB::insert('insert into estados (estado_id, nome, uf) values(?, ?, ?)', [26, 'São Paulo', 'SP']);
        DB::insert('insert into estados (estado_id, nome, uf) values(?, ?, ?)', [27, 'Tocantins', 'TO']);
    }
}
