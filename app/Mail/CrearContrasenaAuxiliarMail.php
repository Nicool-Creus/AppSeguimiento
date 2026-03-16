<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;


class CrearContrasenaAuxiliarMail extends Mailable
{
    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function build()
    {
        return $this->subject('Crear contraseña')
            ->view('Correo.correo_Crear_Contrasena_Auxiliar');
    }
}

/*class CrearContrasenaAuxiliarMail extends Mailable
{
    public $aprendiz;
    public $asunto;
    public $cambios;
    public function __construct($aprendiz, $asunto, $cambios = [])
    {
        $this->aprendiz = $aprendiz;
        $this->asunto = $asunto;
        $this->cambios = $cambios;
    }

    public function build()
    {
        return $this->subject($this->asunto)->view('Correo.correoAprendices')
            ->with(['aprendiz' => $this->aprendiz,
                'asunto' => $this->asunto,
                'cambios' => $this->cambios]);
    }

}*/
