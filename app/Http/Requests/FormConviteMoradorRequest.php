<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class FormConviteMoradorRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email|unique:usuarios,email',
            'nome' => 'required|max:255',
            'numero_apartamento' => 'required',
        ];
    }

    public function messages()
    {
        return config('mensagens.convite-morador.form');
    }
}
