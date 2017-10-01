<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class FormCadastroCondominioRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email|unique:usuarios,email',
            'nome_sindico' => 'required|max:255',
            'nome_condominio' => 'required|max:255',
            'numero_apartamento' => 'required',
            'password' => 'required|confirmed',
            'cidade_id' => 'required|exists:cidades',
        ];
    }

    public function messages()
    {
        return config('mensagens.cadastro-condominio.form');
    }
}
