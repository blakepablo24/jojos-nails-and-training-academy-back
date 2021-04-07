<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalonTreatment;
use App\Models\SingleSalonTreatment;

class SalonTreatmentController extends Controller
{
    public function getAllSalonTreatments()
    {
        $salonTreatments = SalonTreatment::all();

        return response()->json($salonTreatments);
    }

    public function getSubCatSalonTreatments($id)
    {
        $subCategoryTitle = SalonTreatment::find($id);
        $subCatSalonTreatments = SingleSalonTreatment::where('category', $id)->get();

        return response()->json(['subCategoryTitle' => $subCategoryTitle->title, 'subCatSalonTreatments' => $subCatSalonTreatments]);
    }

    public function getSingletSalonTreatment($id)
    {

        $singleSalonTreatment = SingleSalonTreatment::with('category')->find($id);

        return $singleSalonTreatment;

    }
}
