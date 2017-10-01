<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

final class Convite extends Model
{
    const TOKEN_INVALIDO = 1;
    const TOKEN_VENCIDO = 2;

    protected $table = 'convites';

    protected $fillable = [
        'email',
        'nome',
        'numero_apartamento',
        'bloco',
        'token',
        'created_at',
    ];

    public $timestamps = false;

    public function condominio()
    {
        return $this->belongsTo(Condominio::class, 'condominio_id');
    }

    /**
     * @return bool
     */
    public function isVencido(): bool
    {
        $dataCriacao = Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at);
        $dataMaxima = $dataCriacao->addHours(config('mail.validade_token', 24));

        return Carbon::now()->gt($dataMaxima);
    }

    public function deletar()
    {
        return DB::delete('DELETE FROM convites where token = ?', [$this->token]);
    }
}
