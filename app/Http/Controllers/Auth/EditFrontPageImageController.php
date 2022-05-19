<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreNewFrontPageImage;
use App\Models\FrontPageImages;
use Helper;

class EditFrontPageImageController extends Controller
{
    public function addNewFrontPageImage(StoreNewFrontPageImage $request){
        $frontPageImage = new FrontPageImages;
        $frontPageImage->image = Helper::imageUpdate($request->newImage, '/images/front-page-images/landing-page-images/', "");
        $data = getimagesize($request->newImage);
        $width = $data[0];
        $height = $data[1];
        if($width > $height){
            $frontPageImage->orientation = "landscape";
        } else {
            $frontPageImage->orientation = "portrait";
        }
        $frontPageImage->save();
    }

    public function deleteFrontPageImage($id){
        $frontPageImage = FrontPageImages::find($id);
        Helper::imageDelete('/public/images/front-page-images/landing-page-images/', $frontPageImage->image);
        $frontPageImage->delete();
    }
}
