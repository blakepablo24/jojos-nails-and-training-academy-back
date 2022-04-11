<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use PDF;

class ApprovedVoucher extends Mailable
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
        $this->imageToEmbed = storage_path('public/images/front-page-images/jojos-nails-logo-drkr1.png');
        $this->voucherPdf = '/public/vouchers/'.$request->name." - ".$request->id.'.pdf';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("new-booking-enquiry@jojosnailandbeautytrainingacademy.paulrobsondev.co.uk")
                    ->subject('Your JOJOS Voucher')
                    ->view('emails.approved-voucher')
                    ->attachFromStorage($this->voucherPdf);
    }
}
