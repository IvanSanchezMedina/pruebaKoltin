<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailMessages extends Mailable
{
    use Queueable, SerializesModels;

    // public $users;
    public $readMessages;
    public $unreadMessages;
    public $conversations;
    public $name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    // public function __construct()
    public function __construct($readMessages,$unreadMessages,$conversations,$name)
    {
        $this->readMessages = $readMessages;
        $this->unreadMessages = $unreadMessages;
        $this->conversations = $conversations;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        return $this->subject('Resumen de mensajes diario - Servicios Online')
                // ->to($this->users['email'])
                ->view('mail.resume')
                ->with([
                    'readMessages' => $this->readMessages,
                    'unreadMessages' => $this->unreadMessages,
                    'conversations' => $this->conversations,
                    'name'=>$this->name
                    // 'otraVariable' => $this->otraVariable,
                ]);
    }
}
