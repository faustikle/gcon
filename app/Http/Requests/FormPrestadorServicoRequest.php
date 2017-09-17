<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class FormPrestadorServicoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'required|max:255',
            'responsavel' => 'required|max:50',
            'telefone' => 'max:10',
            'celular' => 'max:11',
            'cpf' => 'max:11|required_without:cnpj',
            'cnpj' => 'max:14|required_without:cpf',
            'endereco' => 'required|max:255',
            'numero' => 'required|max:10',
            'bairro' => 'required|max:40',
            'cep' => 'required|digits:8',
            'categorias' => 'required',
        ];
    }

    public function messages()
    {
        return config('mensagens.prestadores_servico.form');
    }

    public function isUpdate(): bool
    {
        return $this->has('prestador_servico_id');
    }
}
