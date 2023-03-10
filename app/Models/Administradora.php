<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administradora extends Model
{
    use HasFactory;

    protected $table = 'imoadm';
    protected $primaryKey = 'cod';

    public function imovel() {
        // return $this->belongsTo(Imovel::class, 'chave_imoimo', 'chave_imoadm');
        return $this->belongsTo(Imovel::class, 'adm', 'cod');
    }
}
