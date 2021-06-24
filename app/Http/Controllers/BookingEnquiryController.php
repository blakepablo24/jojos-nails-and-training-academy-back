<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewBookingEnquiry;
use App\Http\Requests\StoreNewCustomerBookingEnquiry;

class BookingEnquiryController extends Controller
{
    public function newBookingEnquiry(StoreNewCustomerBookingEnquiry $request){
        // Mail::to("new-booking-enquiry@jojosnailandbeautytrainingacademy.paulrobsondev.co.uk")->send(new NewBookingEnquiry($request));

        return $request;
    }
}
