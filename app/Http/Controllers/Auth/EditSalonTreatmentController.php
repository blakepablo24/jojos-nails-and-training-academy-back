<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SingleSalonTreatment;
use App\Models\SalonTreatment;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreEditedSalonTreatment;
use Helper;

class EditSalonTreatmentController extends Controller
{

    public function getSalonTreatmentCategories() {
        
        $categories = SalonTreatment::all();

        return response()->json(['categories' => $categories]);
    }

    public function updateSalonTreatment(StoreEditedSalonTreatment $request){

        $salonTreatment = SingleSalonTreatment::find($request->id);
        $salonTreatment->category = $request->category;
        $salonTreatment->title = ucwords($request->title);
        $salonTreatment->price = $request->price;
        $salonTreatment->duration = $request->duration;
        $salonTreatment->description = ucfirst($request->description);
        if($request->newImage){
            if($salonTreatment->image){
                Helper::imageDelete('/public/images/salon-treatment-images/single-salon-treatment-images/', $salonTreatment->image);
            }
            $salonTreatment->image = Helper::imageUpdate($request->newImage, '/images/salon-treatment-images/single-salon-treatment-images/', ucwords($request->title));
            $salonTreatment->save();
            return response()->json(['salonTreatment' => $salonTreatment]);
        }
        $salonTreatment->save();
        return response()->json(['salonTreatment' => $salonTreatment]);
    }

    public function getSingleSalonTreatmentToEdit($id) {

        $categories = $this->getSalonTreatmentCategories();
        $salonTreatment = SingleSalonTreatment::find($id);

        return response()->json(['salonTreatment' => $salonTreatment, 'categories' => $categories]);
    }

    public function deleteSalonTreatmentImage($id) {
        $salonTreatment = SingleSalonTreatment::find($id);
        Helper::imageDelete('/public/images/salon-treatment-images/single-salon-treatment-images/', $salonTreatment->image);
        $salonTreatment->image = "";
        $salonTreatment->save();

        return response()->json(['salonTreatment' => $salonTreatment]);
    }

    public function deleteSalonTreatment($id){
        
        $salonTreatment = SingleSalonTreatment::find($id);

        if($salonTreatment->image){
            Helper::imageDelete('/public/images/salon-treatment-images/single-salon-treatment-images/', $salonTreatment->image);
        }

        $salonTreatment->delete();

        return response()->json(['message' => 'Treatment Successfully Deleted']);
    }
}
