<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class FormPautaRequest extends FormRequest
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
        ];
    }

    public function messages()
    {
        return config('mensagens.pauta.form');
    }

    public function isUpdate(): bool
    {
        return $this->has('pauta_id');
    }
}
