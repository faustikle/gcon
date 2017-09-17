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
        ];
    }

    public function messages()
    {
        return config('mensagens.servico.form');
    }

    public function isUpdate(): bool
    {
        return $this->has('servico_id');
    }
}
