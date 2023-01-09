<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $table = 'imomat';
    protected $primaryKey = 'sr_recno';
    public $incrementing = false;

    public function imovel() {
        // return $this->belongsTo(Imovel::class, 'chave_imoimo', 'chave_imomat');
        return $this->belongsTo(Imovel::class, 'num', 'imo');
    }
}
