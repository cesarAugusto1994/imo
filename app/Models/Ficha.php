<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ficha extends Model
{
    use HasFactory;
    
    protected $table = 'imofic';
    public $primaryKey = 'sr_recno';
    // public $incrementing = false;

    public function contrato() {
        return $this->hasMany(Contrato::class, 'con', 'con');
    }

    //Recebimento de Alugueis (imorec)
    public function recebimentos() {
        return $this->hasMany(Recebimento::class, 'con', 'con');
    }
}
