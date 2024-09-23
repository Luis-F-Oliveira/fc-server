<?php

namespace App\Mail;

use App\Models\Servants;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendCollectedData extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        protected array $collectedData,
        protected Servants $servant,
        protected string $api
    ) {}

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $currentDate = now()->format('d/m/Y');
        return new Envelope(
            subject: 'Notificação Facilita Diário - ' . $currentDate,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $uniqueData = collect($this->collectedData)->unique('order')->toArray();

        return new Content(
            view: 'emails.data',
            with: [
                'groupedData' => $uniqueData,
                'servant' => $this->servant,
                'apiUrl' => $this->api
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
