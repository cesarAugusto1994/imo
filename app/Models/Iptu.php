<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iptu extends Model
{
    use HasFactory;

    protected $table = 'imoipt';
    protected $primaryKey = 'sr_recno';
}
