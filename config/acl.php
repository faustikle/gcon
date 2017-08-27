<?php

use App\Models\Usuario;

return [
    'reunioes.menu' => [Usuario::SINDICO, Usuario::MORADOR],
    'reunioes.listar' => [Usuario::SINDICO, Usuario::MORADOR],
    'reunioes.visualizar' => [Usuario::SINDICO, Usuario::MORADOR],
    'reunioes.excluir' => [Usuario::SINDICO],
    'reunioes.editar' => [Usuario::SINDICO],
    'reunioes.cadastro' => [Usuario::SINDICO],

    'pautas.cadastro' => [Usuario::SINDICO],
    'pautas.editar' => [Usuario::SINDICO],
    'pautas.excluir' => [Usuario::SINDICO],
    'votos.votar' => [Usuario::SINDICO, Usuario::MORADOR],
    'votos.total' => [Usuario::SINDICO],

    'ocorrencias.menu' => [Usuario::SINDICO, Usuario::MORADOR],
    'ocorrencias.listar' => [Usuario::SINDICO, Usuario::MORADOR],
    'ocorrencias.visualizar' => [Usuario::SINDICO, Usuario::MORADOR],
    'ocorrencias.registrar' => [Usuario::SINDICO, Usuario::MORADOR],
    'ocorrencias.resolver' => [Usuario::SINDICO],
];