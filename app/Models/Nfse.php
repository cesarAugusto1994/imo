<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Nfse extends Model
{
    protected $table = 'imonnf';
    public $primary_key = 'sr_recno';
    // public $incrementing = false;

    //Itens da Nfse (imonfi)
    public function itens() {
        return DB::table('imonfi')->where(['con'=>$this->con,'par'=>$this->par])->get();
    }
}
