<?php

namespace App\Models;

use App\Mail\AprendicesMail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class aprendices extends Model
{

    use HasFactory;
    protected $table = 'tblaprendices';
    protected $primaryKey = 'NIS';
    protected $keyType = 'int';

    public $timestamps = false;

    protected $fillable = [
        'NIS', 'tbltiposdocumentos_NIS', 'NumDoc', 'Nombres', 'Apellidos', 'Direccion', 'Telefono', 'CorreoInstitucional', 'CorreoPersonal', 'Sexo', 'FechaNac', 'TokenRegistro','tbleps_NIS'
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
    //Enviar correo cuando se cree, atualice o borre algún dato del aprendiz
    protected static function booted()
    {
        static::created(function ($aprendices) {
           Mail::to(config('mail.from.address'))
           ->send(new AprendicesMail($aprendices, 'Registro de aprendiz'));
        });
        static::updated(function ($aprendices) {
            $cambios=[];

            foreach ($aprendices->getChanges() as $campo => $valorNuevo) {
                if ($campo != 'updated_at') {
                    $valorViejo = $aprendices->getOriginal($campo);
                    $cambios[$campo]= [
                        'Antes' => $valorViejo,
                        'Después' => $valorNuevo,
                    ];
                }
            }
            Mail::to(config('mail.from.address'))->send(new AprendicesMail($aprendices, 'Datos del aprendiz actualizados', $cambios));
        });
        static::deleted(function ($aprendices) {
            Mail::to(config('mail.from.address'))->send(new AprendicesMail($aprendices, 'Datos del aprendiz eliminados'));
        });
    }
}
