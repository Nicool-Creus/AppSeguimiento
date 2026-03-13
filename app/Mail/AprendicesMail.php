<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;


class AprendicesMail extends Mailable
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

}
