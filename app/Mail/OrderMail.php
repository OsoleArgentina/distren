<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $datos;
    public $pedido;
    public $compra;

    public function __construct($data)
    {
        $this->datos = $data['datos'];
        $this->compra = $data['compra'];
        $this->pedido = $data['pedido'];

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Pedido de producto')->view('mail.compra');
    }
}
