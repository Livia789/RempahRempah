<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class generalEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public string $title;
    public string $greeting;
    public string $body;
    public ?string $body_2;
    public ?string $textBox;
    public string $warning;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $subject, string $title, string $greeting, string $body, ?string $body_2, ?string $textBox, string $warning)
    {
        $this->subject = $subject;
        $this->title = $title;
        $this->greeting = $greeting;
        $this->body = $body;
        $this->body_2 = $body_2;
        $this->textBox = $textBox;
        $this->warning = $warning;
    }

    public function build()
    {
        return $this->view('email')
                    ->with([
                        'subject' => $this->subject,
                        'title' => $this->title,
                        'greeting' => $this->greeting,
                        'body' => $this->body,
                        'body_2' => $this->body_2,
                        'textBox' => $this->textBox,
                        'warning' => $this->warning,
                    ]);
                    // ->attach(public_path('/assets/logo_rempah.png'), [
                    //     'as' => 'logo_rempah',
                    //     'mime' => 'image/png',
                    // ]);
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: $this->subject
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            // view: 'view.name',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
