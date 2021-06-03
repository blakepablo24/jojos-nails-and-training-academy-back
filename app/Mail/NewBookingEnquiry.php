<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewBookingEnquiry extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("new-booking-enquiry@jojosnailandbeautytrainingacademy.paulrobsondev.co.uk")
                    ->replyTo($this->request['email'], $this->request['name'])
                    ->subject('New Enquiry')
                    ->view('emails.new-booking-enquiry');
    }
}
