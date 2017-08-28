<?php

namespace App\Validators;

use Carbon\Carbon;
use Illuminate\Validation\Validator;

final class DataFuturaValidator
{
    public function validate(string $attribute, string $value, array $parameters, Validator $validator)
    {
        $dataAtual = Carbon::now()->startOfDay();

        $dataValidar = Carbon::createFromFormat('Y-m-d', $value)->startOfDay();

        return $dataValidar->gte($dataAtual);
    }
}
