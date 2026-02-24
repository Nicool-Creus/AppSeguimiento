<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class centrosdeformacion extends Model
{
    use HasFactory;
    protected $table = 'tblcentrosdeformacion';

    protected $fillable = [
        'NIS', 'Codigo', 'Denominacion', 'Direccion', 'Observaciones'
    ];
    public $timestamps = false;
}
