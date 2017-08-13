<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reuniao extends Model
{
    protected $table = 'reunioes';

    public function condominio()
    {
        return $this->belongsTo(Condominio::class);
    }
}
