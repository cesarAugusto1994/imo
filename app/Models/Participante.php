<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{
    protected $table = 'imoven';
    public $primaryKey = 'cgc';
    public $incrementing = false;


    public function debitos() {
        // return $this->hasMany(Debito::class, 'chave_imodeb_db', 'chave_imoven_db');
        return $this->hasMany(Debito::class, 'pro', 'cgc');
    }

    public function dependentes() {
        return $this->hasMany(Dependente::class, 'cgc', 'cgc');
    }

    public function imoveis() {
        return $this->hasMany(Imovel::class, 'cgc', 'cgc');
    }

    public function municipio() {
        return $this->belongsTo(Municipio::class, 'cid', 'cid');
    }
}
