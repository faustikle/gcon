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

    'prestadores.menu' => [Usuario::SINDICO, Usuario::MORADOR],
    'prestadores.listar' => [Usuario::SINDICO, Usuario::MORADOR],
    'prestadores.visualizar' => [Usuario::SINDICO, Usuario::MORADOR],
    'prestadores.cadastro' => [Usuario::SINDICO],
    'prestadores.excluir' => [],
    'prestadores.editar' => [],

    'servicos.menu' => [Usuario::SINDICO, Usuario::MORADOR],
    'servicos.listar' => [Usuario::SINDICO, Usuario::MORADOR],
    'servicos.listar.compartilhados' => [Usuario::SINDICO, Usuario::MORADOR],
    'servicos.visualizar' => [Usuario::SINDICO, Usuario::MORADOR],
    'servicos.cadastro' => [Usuario::SINDICO],
    'servicos.excluir' => [Usuario::SINDICO],
    'servicos.editar' => [Usuario::SINDICO],

    'documentos.excluir' => [Usuario::SINDICO],

    'documentos-condominio.menu' => [Usuario::SINDICO, Usuario::MORADOR],
    'documentos-condominio.listar' => [Usuario::SINDICO, Usuario::MORADOR],
    'documentos-condominio.cadastro' => [Usuario::SINDICO],

    'moradores.menu' => [Usuario::SINDICO, Usuario::MORADOR],
    'moradores.listar' => [Usuario::SINDICO, Usuario::MORADOR],
    'moradores.cadastro' => [Usuario::SINDICO],
];