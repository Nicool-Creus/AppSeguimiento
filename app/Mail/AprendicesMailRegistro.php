<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class AprendicesMailRegistro extends Mailable
{
    public $aprendiz;
    public $token;

    public function __construct($aprendiz, $token)
    {
        $this->aprendiz = $aprendiz;
        $this->token = $token;
    }

    public function build()
    {
        return $this->subject('Registro en la plataforma')
            ->view('Correo.correoAprendices');
    }
}
