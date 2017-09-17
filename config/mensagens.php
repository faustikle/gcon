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
            'titulo.max' => 'O título da reunião deve ter no máximo :max caracteres',

            //Data Abertura
            'data_abertura.required'  => 'A data de abertura é obrigatória',
            'data_abertura.date'  => 'A data de abertura deve ser uma data válida',
            'data_abertura.data_futura'  => 'A data de abertura deve ser maior que hoje',

            // Data Encerramento
            'data_encerramento.required'  => 'A data de encerramento é obrigatória',
            'data_encerramento.date'  => 'A data de encerramento deve ser uma data válida',
            'data_encerramento.data_futura'  => 'A data de encerramento deve ser maior que hoje.',
        ]
    ],
    'votacao' => [
        'reuniao-nao-aberta' => 'Não é permitida votação nesta pauta agora!',
        'ja-votada' => 'Você ja votou nesta pauta!',
        'erro' => 'Erro ao salvar votação!',
        'sucesso' => 'Votação realizada!'
    ],
    'ocorrencia' => [
        'resolvida-sucesso' => 'Ocorrência resolvida com sucesso!',
        'resolvida-erro' => 'Ocorreu algum erro ao resolver a ocorrência.',
        'cadastro-sucesso' => 'Ocorrência registrada com sucesso!',
        'cadastro-erro' => 'Ocorreu algum erro ao registrar a ocorrência.',
        'form' => [
            // Titulo
            'titulo.required' => 'O titulo é obrigatório',

            //Descricao
            'descricao.required' => 'A descrição é obrigatória',
        ]
    ],
    'servicos' => [
        'cadastro-sucesso' => 'Serviço salvo com sucesso!',
        'cadastro-erro' => 'Ocorreu algum erro ao salvar o serviço.',
        'excluir-sucesso' => 'Serviço excluido com sucesso!',
        'excluir-erro' => 'Ocorreu algum erro ao excluir serviço.',
        'form' => [
            // Titulo
            'titulo.required' => 'O titulo é obrigatório',
            'titulo.max' => 'O título do serviço deve ter no máximo :max caracteres',

            // Descrição
            'descricao.required' => 'A descricao é obrigatória',

            // Valor
            'valor.required' => 'O valor é obrigatório',
            'valor.numeric' => 'Valor inválido.',

            // Data
            'data.required' => 'A data é obrigatória',
            'data.date'  => 'A data deve ser uma data válida',
            'data.data_futura'  => 'A data deve ser maior que hoje',

            // Prestador
            'prestador.required' => 'O prestador de serviço é obrigatório',
        ]
    ],
    'prestadores_servico' => [
        'cadastro-sucesso' => 'Prestador de Serviço salvo com sucesso!',
        'cadastro-erro' => 'Ocorreu algum erro ao salvar o prestador de serviço.',
        'excluir-sucesso' => 'Prestador de Serviço excluido com sucesso!',
        'excluir-erro' => 'Ocorreu algum erro ao excluir o serviço.',
        'form' => [
            // Nome
            'nome.required' => 'O nome é obrigatório',
            'nome.max' => 'O nome do prestador de serviço deve ter no máximo :max caracteres',

            // Responsavel
            'responsavel.required' => 'O responsável é obrigatório',
            'responsavel.max' => 'O responsável deve ter no máximo :max caracteres',

            // Telefone/Celular
            'telefone.max' => 'O telefone deve ter no máximo :max caracteres',
            'celular.max' => 'O telefone deve ter no máximo :max caracteres',

            // CPF/CNPJ
            'cpf.max' => 'O CPF deve ter no máximo :max caracteres',
            'cnpj.max' => 'O CNPJ deve ter no máximo :max caracteres',
            'cnpj.required_without' => 'É necessário informar o CPF e/ou CNPJ',
            'cpf.required_without' => 'É necessário informar o CPF e/ou CNPJ',

            // Endereco
            'endereco.required' => 'O endereço é obrigatório',
            'endereco.max' => 'O endereço deve ter no máximo :max caracteres',

            // Numero
            'numero.required' => 'O numero é obrigatório',
            'numero.max' => 'O numero deve ter no máximo :max caracteres',

            // Bairro
            'bairro.required' => 'O bairro é obrigatório',
            'bairro.max' => 'O bairro deve ter no máximo :max caracteres',

            // CEP
            'cep.required' => 'O CEP é obrigatório',
            'cep.digits' => 'O CEP deve ter :digits dígitos',

            // Categoria
            'categorias.required' => 'É necessário informar ao menos uma categoria',
        ]
    ],
];