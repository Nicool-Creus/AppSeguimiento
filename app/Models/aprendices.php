<?php

namespace App\Models;

use App\Mail\CrearContrasenaAuxiliarMail;
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
        //Se envía un correo cuando se registra un aprendiz
        static::created(function ($aprendiz) {
           Mail::to($aprendiz->CorreoInstitucional)
           ->send(new CrearContrasenaAuxiliarMail($aprendiz, 'Registro de aprendiz'));
        });

        //Cuando se actualizan los datos del aprendiz
        static::updated(function ($aprendiz) {
            $cambios=[];

            foreach ($aprendiz->getChanges() as $campo => $valorNuevo) {
                if ($campo != 'updated_at') {
                    $valorViejo = $aprendiz->getOriginal($campo);
                    $cambios[$campo] = [
                        'Antes' => $valorViejo,
                        'Después' => $valorNuevo,
                    ];
                }
            }
            if (!empty($cambios)) {
                Mail::to($aprendiz->CorreoInstitucional)->send(new CrearContrasenaAuxiliarMail($aprendiz, 'Datos del aprendiz actualizados', $cambios));
            }
        });

        //Cuando se elimina un registro
        static::deleted(function ($aprendiz) {
            Mail::to($aprendiz->CorreoInstitucional)->send(new CrearContrasenaAuxiliarMail($aprendiz, 'Datos del aprendiz eliminados'));
        });
    }
}
