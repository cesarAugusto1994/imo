<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maladireta extends Model
{
    protected $table = 'imomal';
    protected $primary_key = 'cgc';

    public function responsavel() {
        if ($this->loc == 'Propr.') {
            return $this->belongsTo(Proprietario::class, 'cgc', 'cgc');
        } elseif ($this->loc == 'Fiad.') {
            return $this->belongsTo(Fiador::class, 'cgc', 'cgc');
        }
        return $this->belongsTo(Inquilino::class, 'cgc', 'cgc');
    }
}
