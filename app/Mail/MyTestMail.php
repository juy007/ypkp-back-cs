<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MyTestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('E-mail coba')
            ->from('info-noreply@pascasarjanausbypkp.ac.id')
            ->view('email/email_registrasi');
            /*
            ->with(
                [
                    'nama' => 'Diki Alfarabi Hadi',
                    'website' => 'www.malasngoding.com',
                ]);
                */
    }
}