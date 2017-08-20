<?php

use App\Models\Usuario;

return [
    'reunioes.menu' => [Usuario::SINDICO, Usuario::MORADOR],
    'reunioes.listar' => [Usuario::SINDICO, Usuario::MORADOR],
    'reunioes.visualizar' => [Usuario::SINDICO, Usuario::MORADOR],
    'reunioes.excluir' => [Usuario::SINDICO],
    'reunioes.cadastro' => [Usuario::SINDICO],
    'votos.votar' => [Usuario::SINDICO, Usuario::MORADOR],
    'votos.total' => [Usuario::SINDICO],
];