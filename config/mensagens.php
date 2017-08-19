<?php

return [
    'reuniao' => [
        'form' => [
            // Titulo
            'titulo.required' => 'O titulo é obrigatório',
            'titulo.max' => 'O título da reunião deve ter no máximo 255 caracteres',

            //Data Abertura
            'data_abertura.required'  => 'A data de abertura é obrigatória',
            'data_abertura.date'  => 'A data de abertura deve ser uma data válida',
            'data_abertura.after_or_equal'  => 'A data de abertura deve ser maior que hoje.',

            // Data Encerramento
            'data_encerramento.required'  => 'A data de encerramento é obrigatória',
            'data_encerramento.date'  => 'A data de encerramento deve ser uma data válida',
            'data_encerramento.after_or_equal'  => 'A data de encerramento deve ser maior que hoje.',
        ]
    ]
];