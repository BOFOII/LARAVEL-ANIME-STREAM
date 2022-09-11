<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    private string $name = '';
    private string $address = '';
    private string $subject_msg = '';
    private string $message = '';

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $name, string $address, string $subject, string $message)
    {
        $this->name = $name;
        $this->address = $address;
        $this->subject_msg = $subject;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject_msg)->view('mails.contact', [
            'address' => $this->address,
            'name' => $this->name,
            'msg' => $this->message,
        ]);
    }
}
