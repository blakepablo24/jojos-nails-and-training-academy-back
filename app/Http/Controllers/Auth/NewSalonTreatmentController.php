<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\SingleSalonTreatment;
use App\Http\Requests\StoreNewSalonTreatment;
use Helper;

class NewSalonTreatmentController extends Controller
{
    public function newSalonTreatment(StoreNewSalonTreatment $request) {

        $newSalonTreatment =  new SingleSalonTreatment;
        $newSalonTreatment->category = $request->category;
        $newSalonTreatment->title = ucwords($request->title);
        $newSalonTreatment->price = $request->price;
        $newSalonTreatment->duration = $request->duration;
        $newSalonTreatment->description = ucfirst($request->description);

        if($request->newImage){
            $newSalonTreatment->image = Helper::imageUpdate($request->newImage, '/images/salon-treatment-images/single-salon-treatment-images/', ucwords($request->title));
        } else {
            $newSalonTreatment->image = "";
        }

        $newSalonTreatment->save();

        return response()->json(['newSalonTreatment' => $newSalonTreatment]);
    }
}
