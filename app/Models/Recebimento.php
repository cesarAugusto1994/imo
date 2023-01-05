<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Recebimento extends Model
{
    protected $table = 'imorec';
    protected $primary_key = 'sr_recno';

    public function contrato() {
        // return $this->belongsTo(Contrato::class, 'chave_imocon_db', 'chave_imorec_db');
        return $this->belongsTo(Contrato::class, 'con', 'con');
    }

    //Recebimento de Alugueis (imorec)
    public function creditado() {
        return $this->belongsTo(Creditado::class, 'con', 'con');
    }

    //Lançamentos Futuros (imolan)
    public function lancamentos() {
        return $this->belongsTo(Lancamento::class, 'con', 'con');
    }

    //Fichas de Compensação (imofic)
    public function ficha() {
        //     return $this->hasMany(Ficha::class, 'con+qtp', 'con+qtp');
        return DB::table('imofic')->where(['con'=>$this->con,'qtp'=>$this->qtp])->first();
    }

    //NFSe (imonnf)
    public function nfse() {
        //     return $this->hasMany(Nfse::class, 'con+par', 'con+qtp');
        return DB::table('imonnf')->where(['con'=>$this->con,'par'=>$this->qtp])->first();
    }

    //IRs Calculados (imoirc)
    public function ircalculado() {
        //     return $this->hasMany(Irscalculado::class, 'con+qtp', 'con+qtp');
        return DB::table('imoirc')->where(['con'=>$this->con,'qtp'=>$this->qtp])->first();
    } 
    
    //Cheques/DOCs/PIXs Repassados (imoche)
    public function cheque() {
        //     return $this->hasMany(Cheque::class, 'con+par', 'con+qtp');
        return DB::table('imoche')->where(['con'=>$this->con,'par'=>$this->qtp])->first();
    } 

    //Cheques Recebidos (Segundo em diante) (imochc)
    public function chequerecebido() {
        //     return $this->belongsTo(Chequerecebido::class, 'con+par', 'con+qtp');
        return DB::table('imochc')->where(['con'=>$this->con,'par'=>$this->qtp])->first();
    } 

    //Cheques Repassados (imoch1)
    public function chequerepassado() {
        //     return $this->belongsTo(Chequerepassado::class, 'con+par', 'con+qtp');
        return DB::table('imoch1')->where(['con'=>$this->con,'par'=>$this->qtp])->first();
    } 

    //Arredondamento de Extratos (imoarr)
    public function arrextrato() {
        //     return $this->belongsTo(Arrextrato::class, 'con+par', 'con+qtp');
        return DB::table('imoarr')->where(['con'=>$this->con,'par'=>$this->qtp])->first();
    } 
}
