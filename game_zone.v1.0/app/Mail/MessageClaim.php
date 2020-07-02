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
    public $user_mail;
    public $subject= 'Game-Zone Reclamo';
    public $body;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order, $name, $mail, $body){
        $this->order = $order;
        $this->user_name = $name;
        $this->user_mail = $mail;
        $this->body = $body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.claimMail');
    }
}
