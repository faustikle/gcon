<?php

namespace App\Http\Requests;

use App\Models\Financeiro\CategoriaLancamento;
use App\Models\Financeiro\Lancamento;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

final class FormLancamentoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'tipo' => ['required',Rule::in([Lancamento::RECEITA, Lancamento::DESPESA])],
            'categoria' => 'required|exists:categorias_lancamento,categoria_lancamento_id',
            'descricao' => 'required|max:45',
            'data' => 'required|date',
            'valor' => 'required|numeric',
            'observacao' => 'max:255',
        ];
    }

    public function messages()
    {
        return config('mensagens.lancamento.form');
    }

    /**
     * @return array
     */
    public function inputs()
    {
        return [
            'tipo' => $this->input('tipo'),
            'descricao' => $this->input('descricao'),
            'data' => $this->input('data'),
            'valor' => floatval($this->input('valor')),
            'observacao' => $this->input('observacao', null),
        ];
    }

    /**
     * @return CategoriaLancamento
     */
    public function getCategoria(): CategoriaLancamento
    {
        return CategoriaLancamento::find($this->input('categoria'));
    }
}
