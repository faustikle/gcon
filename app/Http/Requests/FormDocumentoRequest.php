<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class FormDocumentoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'required|max:255',
            'descricao' => 'required',
            'documento' => 'required|file',
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
