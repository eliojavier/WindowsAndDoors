<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Invoice extends Mailable
{
    use Queueable, SerializesModels;

    public $invoice_number;

    /**
     * Create a new message instance.
     * @param $invoice_number
     */
    public function __construct($invoice_number)
    {
        $this->invoice_number = $invoice_number;
    }

    /**
     * Build the message.
     * @return $this
     * @internal param Invoice $invoice
     */
    public function build()
    {
        return $this->view('email.invoice')
                    ->from('jjjwindowsanddoors@gmail.com')
                    ->to('geisonfl@aol.com')
                    ->subject('Invoice')
                    ->attach('invoices/'.$this->invoice_number.'.pdf');
    }
}
