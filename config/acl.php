<?php

use App\Models\Usuario;

return [
    'reunioes.menu' => [Usuario::SINDICO, Usuario::MORADOR],
    'reunioes.listar' => [Usuario::SINDICO, Usuario::MORADOR],
    'reunioes.cadastro' => [Usuario::SINDICO],
];