<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $phone;
    public $email;
    public $checkTerminos;
    public $checkPubli;

    public function __construct($name, $phone, $email, $checkTerminos, $checkPubli)
    {
        $this->name=$name;
        $this->phone=$phone;
        $this->email=$email;
        $this->checkTerminos=$checkTerminos;
        $this->checkPubli=$checkPubli;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Prueba de correo')->view('pruebaCorreo');
    }
}
