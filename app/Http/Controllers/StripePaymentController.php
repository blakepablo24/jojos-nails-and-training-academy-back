<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendPaymentDetails;
use App\Models\GiftVouchers;
use App\Models\TrainingCourse;
use App\Models\SingleSalonTreatment;

class StripePaymentController extends Controller
{
    public function newStripePaymentIntent(SendPaymentDetails $request)
    {

        $basketItems = [];
        
        foreach ($request->basketItems as $key => $basketItem) {
            // Check if Traning course
            if ($basketItem["type"] === "TC") {
                $tc = TrainingCourse::find(preg_replace('/[^0-9,.]+/', '', $basketItem["id"]));
                $price = $tc->price * $basketItem["quantity"];
            }
            // Check if Salon treatment
            if ($basketItem["type"] === "ST") {
                $st = SingleSalonTreatment::find(preg_replace('/[^0-9,.]+/', '', $basketItem["id"]));
                $price = $st->price * $basketItem["quantity"];
            }
            // Check if gift voucher
            if ($basketItem["type"] === "gift_voucher") {
                $price = $basketItem["price"] * $basketItem["quantity"];
            }

            array_push($basketItems, $price);
        }

        // Check if payment amount for the requested items is correct in back end and if so process payment

        if(number_format(intval(array_sum($basketItems)), 2) === number_format($request->totalCost, 2)){
            \Stripe\Stripe::setApiKey(config('app.stripe_sk'));

            $intent = \Stripe\PaymentIntent::create([
            'amount' => array_sum($basketItems) * 100,
            'currency' => 'gbp'
            ]);
            $client_secret = $intent->client_secret;
            return response()->json($client_secret);
        } else {
            return response()->json("Error incorrect sums");
        }
    }
}
