<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($dados)
    {
        $this->dados = $dados;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this
            ->from('juliakimura@univem.edu.br', 'Almoxarifado')
            ->to($this->dados->email, $this->dados->name)
            ->subject('Aviso Importante')
            ->view('mail.index');
    }
}
