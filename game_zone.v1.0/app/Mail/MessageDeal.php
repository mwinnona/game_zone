<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageDeal extends Mailable
{
    use Queueable, SerializesModels;

    public $product;
    public $deal_price;
    public $user_name;
    public $subject = 'Game-Zone OFERTAS!!!';
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($product, $new_price, $name){
        $this->product = $product;
        $this->deal_price = $new_price;
        $this->user_name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.dealMail');
    }
}
