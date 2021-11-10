<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\FrontPageImages;

class FrontPageImagesController extends Controller
{
    public function getFrontPageImages(){

        $allFrontPageImages = FrontPageImages::all();
        $frontPageImages = FrontPageImages::where('orientation', 'portrait')->get();
        $largeFrontPageImages = FrontPageImages::where('orientation', 'landscape')->get();

        return response()->json([
            'all_db_images' => $allFrontPageImages,
            'db_images' => $frontPageImages,
            'large_db_images' => $largeFrontPageImages
        ]);
    }
}