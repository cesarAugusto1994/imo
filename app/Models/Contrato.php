<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Texto;

class Contrato extends Model
{
    use HasFactory;

    protected $table = 'imocon';
    public $primaryKey = 'con';
    public $incrementing = false;

    public function proprietario() {
        // return $this->belongsTo(Proprietario::class, 'chave_imopro_db', 'chave_imocon_db');
        return $this->belongsTo(Proprietario::class, 'pro', 'cgc');
    }

    public function inquilino() {
        // return $this->belongsTo(Proprietario::class, 'chave_imoinq_db', 'chave_imocon_db');
        return $this->belongsTo(Inquilino::class, 'inq', 'cgc');
    }

    public function fiador() {
        // return $this->belongsTo(Proprietario::class, 'chave_imofia_db', 'chave_imocon_db');
        return $this->belongsTo(Fiador::class, 'fia', 'cgc');
    }

    public function lancamentos() {
        // return $this->belongsTo(Lancamento::class, 'chave_imolan_db', 'chave_imocon_db');
        return $this->belongsTo(Lancamento::class, 'con', 'con');
    }

    public function creditados() {
        return $this->hasMany(Creditado::class, 'con', 'con');
    }

    public function getTextosAttribute() {
        //Chave iniciado por I vem de Imoveis (imoimo) e iniciada por CL vem de Contratos (imocon)
        $chave = "CL".$this->con;
        return Texto::where('chave', $chave)->get();
    }

    protected $appends = ['textos'];
}