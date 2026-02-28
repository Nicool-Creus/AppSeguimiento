<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fichasdecaracterizacion extends Model
{
    use HasFactory;
    protected $table = 'tblfichasdecaracterizacion';
    protected $primaryKey = 'NIS';
    protected $keyType = 'int';

    protected $fillable = [
        'NIS', 'Codigo', 'Denominacion', 'Cupo', 'FechaInicio', 'FechaFin', 'Observaciones'
    ];
    public $timestamps = false;
    public function centrosdeformacion()
    {
        return $this->belongsTo(centrosdeformacion::class,'tblcentrosdeformacion_NIS','NIS');
    }

    public function programasdeformacion()
    {
        return $this->belongsTo(programasdeformacion::class,'tblprogramasdeformacion_NIS','NIS');
    }
}
