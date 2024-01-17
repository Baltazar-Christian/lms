<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PasswordResetMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $resetToken;

    public function __construct($user, $resetToken)
    {
        $this->user = $user;
        $this->resetToken = $resetToken;
    }

    public function build()
    {
        return $this->view('emails.password_reset');
    }
}
