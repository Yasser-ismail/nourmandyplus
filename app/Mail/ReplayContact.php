<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReplayContact extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $message;
    protected $replayMessage;

    public function __construct($message, $replayMessage)
    {
        $this->message = $message;
        $this->replayMessage = $replayMessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $contactMessage = $this->message;
        $replayMessage = $this->replayMessage;

        return $this->to($contactMessage->email)->
            view('backend.mails.replay-mail', compact('contactMessage', 'replayMessage'));
    }
}
