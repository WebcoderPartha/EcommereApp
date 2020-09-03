<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $order;
    public $carts;
    public $shipping_details;

    public function __construct($order, $carts, $shipping_details)
    {
        $this->order            = $order;
        $this->carts            = $carts;
        $this->shipping_details = $shipping_details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $info = $this->order;
        $cart = $this->carts;
        $ship = $this->shipping_details;

        return $this->view('mail.invoice', compact('info', 'cart', 'ship'))->subject('Product purchased successfully (#'.$info->order_id.')');
    }
}
