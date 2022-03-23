<?php

namespace App\Http\Controllers;

use App\Models\SalonTreatment;
use App\Models\SingleSalonTreatment;

class SalonTreatmentController extends Controller
{
    public function getAllSalonTreatments()
    {
        $salonTreatments = SalonTreatment::with('singleSalonTreatment')->get();

        return response()->json($salonTreatments);
    }

    public function getSubCatSalonTreatments($id)
    {

        $subCategory = SalonTreatment::where('id', $id)->with('singleSalonTreatment')->first();

        return $subCategory;
    }

    public function getSingletSalonTreatment($id)
    {

        $singleSalonTreatment = SingleSalonTreatment::with('category')->find($id);

        return $singleSalonTreatment;

    }
}
