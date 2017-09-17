<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class FormServicoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'titulo' => 'required|max:255',
            'descricao' => 'required',
            'valor' => 'required|numeric',
            'data' => 'required|date|data_futura',
            'prestador' => 'required',
        ];
    }

    public function messages()
    {
        return config('mensagens.servicos.form');
    }

    public function isUpdate(): bool
    {
        return $this->has('servico_id');
    }
}
