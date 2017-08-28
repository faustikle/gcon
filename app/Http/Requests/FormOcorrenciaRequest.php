<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class FormOcorrenciaRequest extends FormRequest
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
        return config('mensagens.ocorrencia.form');
    }
}
