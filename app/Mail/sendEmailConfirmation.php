<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use phpDocumentor\Reflection\Types\This;

class sendEmailConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $hash;
    public $id;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id,$hash)
    {
        $this->hash = $hash;
        $this->id = $id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@gyanschool.com')
        ->view('teacher.confirmEmail');
    }
}
