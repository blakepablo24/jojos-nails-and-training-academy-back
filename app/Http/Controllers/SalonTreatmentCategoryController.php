<?php

namespace App\Http\Controllers;
use App\Models\SalonTreatment;

class SalonTreatmentCategoryController extends Controller
{
    public function getSalonTreatmentCategories() {
        
        $categories = SalonTreatment::all();

        return response()->json(['categories' => $categories]);
    }
}
