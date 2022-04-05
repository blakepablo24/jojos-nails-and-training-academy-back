<?php

namespace App\Http\Controllers;
use App\Models\FrontPageImages;

class FrontPageImagesController extends Controller
{
    public function getFrontPageImages(){
        $fPImages = [];
        $largeFPImages = [];

        $allFrontPageImages = FrontPageImages::all();
        foreach ($allFrontPageImages as $key => $image) {
            if($image->orientation === "landscape"){
                array_push($largeFPImages, $image->image);
            } else {
                array_push($fPImages, $image->image);
            }
        }

        return response()->json([
            'fPImages' => $fPImages,
            'largeFPImages' => $largeFPImages
        ]);
    }
    
    public function getAllFrontPageImages(){

        $allFrontPageImages = FrontPageImages::all();

        return response()->json([
            'all_db_images' => $allFrontPageImages
        ]);
    }
}