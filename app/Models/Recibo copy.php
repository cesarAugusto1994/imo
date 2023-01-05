<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recibo extends Model
{
    protected $table = 'imodiv';
    protected $primary_key = 'cgc';

    public function responsavel() {
        if ($this->tip == 'P') {
            return $this->belongsTo(Proprietario::class, 'cgc', 'cgc');
        } elseif ($this->tip == 'F') {
            return $this->belongsTo(Fiador::class, 'cgc', 'cgc');
        }
        return $this->belongsTo(Inquilino::class, 'cgc', 'cgc');
    }
}
