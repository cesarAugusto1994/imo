<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Creditado extends Model
{
    protected $table = 'imodup';
    public $primary_key = 'cgc';
    public $incrementing = false;

    public function responsavel() {
        if ($this->tip == 'P') {
            return $this->belongsTo(Proprietario::class, 'cgc', 'cgc');
        } elseif ($this->tip == 'F') {
            return $this->belongsTo(Fiador::class, 'cgc', 'cgc');
        }
        return $this->belongsTo(Inquilino::class, 'cgc', 'cgc');
    }

    public function contrato() {
        return $this->belongsTo(Contrato::class, 'con', 'con');
    }

    //Recebimento de Alugueis (imorec)
    public function recebimentos() {
        return $this->hasMany(Recebimento::class, 'con', 'con');
    }
}
