<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recibo extends Model
{
    use HasFactory;

    protected $table = 'imodiv';
    protected $primaryKey = 'cgc';

    public function responsavel() {
        if ($this->tip == 'P') {
            return $this->belongsTo(Proprietario::class, 'cgc', 'cgc');
        } elseif ($this->tip == 'F') {
            return $this->belongsTo(Fiador::class, 'cgc', 'cgc');
        }
        return $this->belongsTo(Inquilino::class, 'cgc', 'cgc');
    }
}
