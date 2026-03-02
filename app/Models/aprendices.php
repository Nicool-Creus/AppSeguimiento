<?php

namespace App\Models;

use App\Models\tiposdocumentos;
use App\Models\eps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aprendices extends Model
{

    use HasFactory;
    protected $table = 'tblaprendices';
    protected $primaryKey = 'NIS';
    protected $keyType = 'int';

    public $timestamps = false;

    protected $fillable = [
        'NIS', 'tbltiposdocumentos_NIS', 'NumDoc', 'Nombres', 'Apellidos', 'Direccion', 'Telefono', 'CorreoInstitucional', 'CorreoPersonal', 'Sexo', 'FechaNac', 'tbleps_NIS'
    ];

    public function tiposdocumentos()
    {
        return $this->belongsTo(tiposdocumentos::class,'tbltiposdocumentos_NIS','NIS');
    }

    public function eps()
    {
        return $this->belongsTo(eps::class,'tbleps_NIS','NIS');
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
