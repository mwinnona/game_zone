<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageOrder extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $productsOrder;
    public $products;
    public $subject = 'Game-Zone Pedido Realizado';
    public $user_name;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct($order, $products_Order, $products, $name){
        $this->order = $order;
        $this->productsOrder = $products_Order;
        $this->products = $products;
        $this->user_name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.orderMail');
    }
}
