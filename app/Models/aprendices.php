<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aprendices extends Model
{
//HI
    use HasFactory;
    protected $table = 'tblaprendices';

    protected $primaryKey = 'NIS';
    protected $keyType = 'int';

    protected $fillable = [
        'NIS', 'TipoDoc', 'NumDoc', 'Nombres', 'Apellidos', 'Direccion', 'Telefono', 'CorreoInstitucional', 'CorreoPersonal', 'Sexo', 'FechaNac'
    ];
    public $timestamps = false;

    public function tiposdocumentos()
    {
        return $this->belongsTo(tiposdocumentos::class,'tbltiposdocumentos_NIS','NIS');
    }

    public function eps()
    {
        return $this->belongsTo(eps::class,'tbleps_NIS','NIS');
    }
}
