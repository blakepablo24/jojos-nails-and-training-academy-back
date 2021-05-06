<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewBookingEnquiry;
use App\Http\Requests\StoreNewCustomerBookingEnquiry;

class BookingEnquiryController extends Controller
{
    public function newBookingEnquiry(StoreNewCustomerBookingEnquiry $request){

        Mail::to("blakepablo24@gmail.com")->queue(new NewBookingEnquiry($request));

        return response()->json($request);
    }
}
