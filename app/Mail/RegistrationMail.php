<?php

namespace App\Mail;
use App\Models\User;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;

class RegistrationMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $user;

    /**
     * Create a new message instance.
     */
    public function __construct()
    {
        $this->user = User::where('id', session()->get('id_user'))->get();
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $lang = App::getLocale();

        if($lang == 'ru'){
            $subject = "Meta GPT - Подтвердите почту";
        }else{
            $subject = "Meta GPT - Confirm your email";
        }

        return new Envelope(
            subject: $subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.registration',
            with: [
                'code' => Auth::user()->code,
                'name' => Auth::user()->name
            ]
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
