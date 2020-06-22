<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageClaim extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $user_name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order, $name){
        $this->order = $order;
        $this->user_name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('view.name');
    }
}
