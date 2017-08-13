<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reuniao extends Model
{
    protected $primaryKey = 'reuniao_id';

    protected $table = 'reunioes';

    public function condominio()
    {
        return $this->belongsTo(Condominio::class, 'condominio_id');
    }
}
