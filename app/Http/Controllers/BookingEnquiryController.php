<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewBookingEnquiry;
use App\Http\Requests\StoreNewCustomerBookingEnquiry;
use App\Models\GiftVouchers;
use App\Models\EnquiryDetails;

class BookingEnquiryController extends Controller
{
    public function newBookingEnquiry(StoreNewCustomerBookingEnquiry $request){

        foreach ($request->itemsInBasket as $item) {
            if($item["type"] === "TC") {
                $this->incrementFoundItem($item["id"], "App\Models\TrainingCourse");
            }
            if($item["type"] === "ST") {
                $this->incrementFoundItem($item["id"], "App\Models\SingleSalonTreatment");
            }

            if($item["type"] === "gift_voucher") {
                $pass = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQURSTWXYZ"), 1, 10);
                $pass = "JOJO-".$pass;

                $gv = new GiftVouchers;
                $gv->to = $item["to"];
                $gv->from = $item["from"];
                $gv->message = $item["title"];
                $gv->voucher_code = $pass;
                $gv->value = $item["price"];
                $gv->save();
            }
        }

                $enquiry = new EnquiryDetails;
                $enquiry->name = $request->name;
                $enquiry->email = $request->email;
                $enquiry->number = $request->number;
                $enquiry->save();

        // Mail::to("new-booking-enquiry@jojosnailandbeautytrainingacademy.paulrobsondev.co.uk")->send(new NewBookingEnquiry($request));

        return response()->json($request);
    }

    private function incrementFoundItem($id, $type){
            $id = preg_replace('/[^0-9.]+/', '', $id);
            $foundItem = $type::find($id);
            $foundItem->enquires = $foundItem->enquires + 1;
            $foundItem->save();
    }
}
