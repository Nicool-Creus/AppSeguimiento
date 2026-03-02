<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class instructores extends Model
{
    use HasFactory;
    protected $table = 'tblinstructores';
    protected $primaryKey = 'NIS';
    protected $keyType = 'int';

    protected $fillable = [
        'NIS', 'tbltiposdocumentos_NIS', 'NumDoc', 'Nombres', 'Apellidos', 'Direccion', 'Telefono', 'CorreoInstitucional', 'CorreoPersonal', 'Sexo', 'FechaNac', 'tbleps_NIS', 'tblrolesadministrativos_NIS'
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
    public function rolesadministrativos()
    {
        return $this->belongsTo(rolesadministrativos::class,'tblrolesadministrativos_NIS','NIS');
    }

    public function sexo()
    {
        return $this->belongsTo(instructores::class,'tblinstructores_NIS','NIS');
    }
    public function getSexoTextoAttribute()
    {
        return match($this->Sexo) {
            1 => 'Masculino',
            2 => 'Femenino',
            default => 'No definido'
        };
    }
}
