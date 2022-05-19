<?php

namespace App\Helpers;
use Illuminate\Support\Facades\Storage;

class Helper
{
    public static function imageUpdate($image, $fileLocation, $name){
        \Tinify\setKey("gpYyPbcWHr93Cjtx9rm87xV2pMDrpch6");

        $filename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        if($name) {
            $filename = $name.$filename;
        }
        $newFileName = $filename.'.webp';
        $storagePath  = Storage::disk('public')->getDriver()->getAdapter()->getPathPrefix();
        $image = imagecreatefromstring(file_get_contents($image));
        ob_start();
        imagejpeg($image,NULL,100);
        $cont = ob_get_contents();
        ob_end_clean();
        imagedestroy($image);
        $content = imagecreatefromstring($cont);
        $output = $storagePath.$fileLocation.$newFileName;
        imagewebp($content,$output,100);
        imagedestroy($content);
        
        $source = \Tinify\fromFile($output);
        $resized = $source->resize(array(
            "method" => "fit",
            "width" => 500,
            "height" => 500
        ));
        $resized->toFile($storagePath.$fileLocation.'small-'.$newFileName);
        $source->toFile($storagePath.$fileLocation.$newFileName);
        return $newFileName;
    }

    public static function imageDelete($location, $name){
        Storage::delete($location.$name);
        Storage::delete($location.'small-'.$name);
    }
}