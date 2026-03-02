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
        'NIS', 'Codigo', 'Denominacion', 'Cupo', 'FechaInicio', 'FechaFin', 'Observaciones', 'tblaprendices_NIS', 'tblcentrosdeformacion_NIS', 'tblprogramasdeformacion_NIS'
    ];
    public $timestamps = false;
    public function aprendiz()
    {
        return $this->belongsTo(aprendices::class,'tblaprendices_NIS','NIS');
    }
    public function centrosdeformacion()
    {
        return $this->belongsTo(centrosdeformacion::class,'tblcentrosdeformacion_NIS','NIS');
    }

    public function programasdeformacion()
    {
        return $this->belongsTo(programasdeformacion::class,'tblprogramasdeformacion_NIS','NIS');
    }
}
