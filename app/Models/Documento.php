<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

final class Documento extends Model
{
    use Identificable;
    use SoftDeletes;

    protected $primaryKey = 'documento_id';

    protected $table = 'documentos';

    protected $fillable = [
        'nome',
        'descricao',
        'caminho',
        'tamanho'
    ];

    protected $dates = ['deleted_at'];

    /**
     * @return bool
     */
    public function exists(): bool
    {
        return Storage::exists($this->caminho);
    }

    /**
     * @return string
     */
    public function getConteudo(): string
    {
        return Storage::get($this->caminho);
    }

    public function getMime(): string
    {
        return Storage::getMetaData($this->caminho)['mimetype'];
    }
}
