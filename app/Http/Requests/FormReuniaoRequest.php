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
            'data_abertura' => 'required|date|after_or_equal:now',
            'data_encerramento' => 'required|date|after_or_equal:now'
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
