<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Administradora extends Model
{
    protected $table = 'imoadm';
    protected $primary_key = 'cod';

    public function imovel() {
        // return $this->belongsTo(Imovel::class, 'chave_imoimo', 'chave_imoadm');
        return $this->belongsTo(Imovel::class, 'adm', 'cod');
    }
}
