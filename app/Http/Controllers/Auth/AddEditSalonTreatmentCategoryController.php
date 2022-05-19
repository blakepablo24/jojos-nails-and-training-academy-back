<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEditedSalonTreatmentCategoryImage;
use App\Http\Requests\StoreUpdatedSalonTreatmentCategories;
use Illuminate\Support\Facades\Storage;
use App\Models\SalonTreatment;
use Helper;

class AddEditSalonTreatmentCategoryController extends Controller
{
    public function addEditSalonTreatmentCategory(StoreUpdatedSalonTreatmentCategories $request) {
        $firstMessage = "";
        $secondMessage = "";
        foreach ($request->categoryItems as $category) {
            if($category["id"] != ""){
                $salonTreatmentCategory = SalonTreatment::find($category["id"]);

                if($category["title"] != $salonTreatmentCategory->title){
                    $salonTreatmentCategory->title = ucwords($category["title"]);
                    $salonTreatmentCategory->save();
                }
                $firstMessage = "edited";
            } else {
                $newSalonTreatmentCategory = new SalonTreatment;
                $newSalonTreatmentCategory->title = ucwords($category["title"]);
                $newSalonTreatmentCategory->image = $category["image"];
                $newSalonTreatmentCategory->save();

                $secondMessage = "new";
            }
        }

        return $firstMessage.$secondMessage;
    }

    public function updateSalonTreatmentCategoryImage(StoreEditedSalonTreatmentCategoryImage $request){
        $salonTreatmentCategory = SalonTreatment::find($request->id);
        if($salonTreatmentCategory->image != "default"){
            Helper::imageDelete('/public/images/salon-treatment-images/', $salonTreatmentCategory->image);
        }
        $salonTreatmentCategory->image = Helper::imageUpdate($request->newImage, '/images/salon-treatment-images/', $salonTreatmentCategory->title);
        $salonTreatmentCategory->save();

        return $salonTreatmentCategory;
    }

    public function deleteSalonTreatmentCategory($id){
        $salonTreatmentCategory = SalonTreatment::find($id);
        if($salonTreatmentCategory->image != "default"){
            Helper::imageDelete('/public/images/salon-treatment-images/', $salonTreatmentCategory->image);
        }
        $salonTreatmentCategory->image = "";
        $salonTreatmentCategory->delete();
    }
}
