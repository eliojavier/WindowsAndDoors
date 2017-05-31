<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Invoice extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.invoice')
                    ->from('postmaster@sandboxf3b765a1730747919ec0eac95d352b6a.mailgun.org')
                    ->to('info@palmarius.com.ve')
                    ->subject('Hello Elio Acosta');
    }
}
