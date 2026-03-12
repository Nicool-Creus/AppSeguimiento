<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AprendicesMail extends Mailable
{
    public $aprendices;
    public $asunto;
    public $accion;
    public $cambios;
    public function __construct($aprendices, $asunto, $accion, $cambios = [])
    {
        $this->aprendices = $aprendices;
        $this->asunto = $asunto;
        $this->accion = $accion;
        $this->cambios = $cambios;
    }

    public function build()
    {
        return $this->subject($this->asunto,'Notificación')->view('Correo.correoAprendices');
    }

}
