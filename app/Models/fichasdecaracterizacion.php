<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fichasdecaracterizacion extends Model
{
    use HasFactory;
    protected $table = 'tblfichasdecaracterizacion';

    protected $fillable = [
        'NIS', 'Codigo', 'Denominacion', 'Cupo', 'FechaInicio', 'FechaFin', 'Observaciones'
    ];
    public $timestamps = false;
}
