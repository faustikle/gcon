<?php

return [
    'geral' => [
        'permissao-negada' => 'Você não tem permissão para executar esta ação.'
    ],
    'pauta' => [
        'cadastro-sucesso' => 'Pauta salva com sucesso!',
        'cadastro-erro' => 'Ocorreu algum erro ao salvar a pauta.',
        'excluir-sucesso' => 'Pauta excluida com sucesso!',
        'excluir-erro' => 'Ocorreu algum erro ao excluir a pauta.',
        'form' => [
            // Titulo
            'titulo.required' => 'O titulo é obrigatório',

            //Descricao
            'descricao.required' => 'A descrição é obrigatória',
        ]
    ],
    'reuniao' => [
        'cadastro-sucesso' => 'Reunião salva com sucesso!',
        'cadastro-erro' => 'Ocorreu algum erro ao salvar a reunião.',
        'excluir-sucesso' => 'Reunião excluida com sucesso!',
        'excluir-erro' => 'Ocorreu algum erro ao excluir a reunião.',
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
    ],
    'votacao' => [
        'reuniao-nao-aberta' => 'Não é permitida votação nesta pauta agora!',
        'ja-votada' => 'Você ja votou nesta pauta!',
        'erro' => 'Erro ao salvar votação!',
        'sucesso' => 'Votação realizada!'
    ]
];