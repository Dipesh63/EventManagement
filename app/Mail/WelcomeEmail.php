<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class WelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $msg;
    public $subject;
    public $fromEmail;
    public $toEmail;




    /**
     * Create a new message instance.
     */
    public function __construct($msgFrom_EmailController,$subjectFrom_EmailController,$frmemailFrom_EmailController,$toemailFrom_EmailController)
    {
        $this->msg = $msgFrom_EmailController;
        $this->subject = $subjectFrom_EmailController;
        $this->fromEmail = $frmemailFrom_EmailController;
        $this->toEmail = $toemailFrom_EmailController;
        
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        // return new Envelope(
            
        //    // subject: 'Welcome Email',
        //    subject: $this->subject,
        // );

        return new Envelope(
            from: new Address($this->fromEmail, 'Event Organizer'),
            replyTo: [new Address($this->toEmail, 'Participant')],
            subject: $this->subject,
        );
        

    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            //view: 'view.name',
            view: 'mail-template.Welcome_mail',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
