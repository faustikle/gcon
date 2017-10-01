<?php

namespace App\Mail;

use App\Models\Convite;
use App\Models\Usuario;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConviteMorador extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Usuario
     */
    private $usuario;

    /**
     * @var Convite
     */
    private $convite;

    /**
     * ConviteMorador constructor.
     * @param Usuario $usuario
     * @param Convite $convite
     */
    public function __construct(Usuario $usuario, Convite $convite)
    {
        $this->usuario = $usuario;
        $this->convite = $convite;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->view('emails.convite-morador')
            ->with([
                'usuario' => $this->usuario,
                'convite' => $this->convite
            ]);
    }
}
