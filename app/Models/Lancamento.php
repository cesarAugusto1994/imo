<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lancamento extends Model
{
    protected $table = 'imolan';
    public $primary_key = 'sr_recno';
    // public $incrementing = false;

    public function contrato() {
        return $this->hasMany(Contrato::class, 'con', 'con');
    }

    //Recebimento de Alugueis (imorec)
    public function recebimentos() {
        return $this->hasMany(Recebimento::class, 'con', 'con');
    }
}
