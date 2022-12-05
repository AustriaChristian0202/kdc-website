<?php

namespace App\Mail;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class StatusChange extends Mailable
{
  use Queueable, SerializesModels;

  /**
   * Create a new message instance.
   *
   * @return void
   */
  public function __construct($email, $name, $schedule, $service, $dentist, $status, $reason = null)
  {
    //
    $this->email = $email;
    $this->name = $name;
    $this->schedule = $schedule;
    $this->service = $service;
    $this->dentist = $dentist;
    $this->status = $status;
    $this->reason = $reason;
  }

  /**
   * Get the message envelope.
   *
   * @return \Illuminate\Mail\Mailables\Envelope
   */
  public function envelope()
  {
    return new Envelope(
      subject: 'Status Change',
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
      markdown: 'emails.statusChangeEmail',
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

  public function build()
  {
    return $this->view('emails.statusChangeEmail')
      ->with([
        'email' => $this->email,
        'name' => $this->name,
        'schedule' => Carbon::parse($this->schedule)->format('F d, Y h:i A'),
        'service' => $this->service,
        'dentist' => $this->dentist,
        'status' => $this->status,
        'reason' => $this->reason,
      ]);
  }
}
