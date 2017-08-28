<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class FormReuniaoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'titulo' => 'required|max:255',
            'data_abertura' => 'required|date|data_futura',
            'data_encerramento' => 'required|date|data_futura'
        ];
    }

    public function messages()
    {
        return config('mensagens.reuniao.form');
    }

    public function isUpdate(): bool
    {
        return $this->has('reuniao_id');
    }
}
