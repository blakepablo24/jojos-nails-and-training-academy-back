<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\FrontPageImages;

class FrontPageImagesController extends Controller
{
    public function getFrontPageImages(){

        $frontPageImages = FrontPageImages::all();

        return response()->json(['db_images' => $frontPageImages]);

    }
}
