<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Texto;

class Imovel extends Model
{
    protected $table = 'imoimo';
    protected $primaryKey = 'cgc';
    public $incrementing = false;

    public function proprietario() {
        // return $this->belongsTo(Proprietario::class, 'chave_imopro_db', 'chave_imoimo_db');
        return $this->belongsTo(Proprietario::class, 'cgc', 'cgc');
    }

    public function iptus() {
        // return $this->hasMany(Iptu::class, 'chave_imoipt_db', 'chave_imoimo_db');
        return $this->hasMany(Iptu::class, 'imo', 'num');
    }

    public function matricula() {
        // return $this->hasMany(Iptu::class, 'chave_imomat_db', 'chave_imoimo_db');
        return $this->belongsTo(Matricula::class, 'imo', 'num');
    }

    public function administradora() {
        // return $this->hasMany(Iptu::class, 'chave_imoadm_db', 'chave_imoimo_db');
        return $this->belongsTo(Administradora::class, 'cod', 'adm');
    }

    //Verificar qual coluna da tabela imoimo se relaciona com a coluna cod da tabela imobbb
    // public function banco() {
    //     return $this->belongsTo(Banco::class, 'bco', 'cod');
    // }

    public function getTextosAttribute() {
        //Chave iniciado por I vem de Imoveis (imoimo) e iniciada por CL vem de Contratos (imocon)
        $chave = "I".$this->num;
        return Texto::where('chave', $chave)->get();
    }

    protected $appends = ['textos'];

}
