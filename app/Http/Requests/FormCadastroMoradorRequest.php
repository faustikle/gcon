<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class FormCadastroMoradorRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'required|max:255',
            'password' => 'required|confirmed',
        ];
    }

    public function messages()
    {
        return config('mensagens.convite-morador.form');
    }
}
