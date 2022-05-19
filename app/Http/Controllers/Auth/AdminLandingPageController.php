<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\TrainingCourse;
use App\Models\SingleSalonTreatment;
use App\Models\SalonTreatment;
use App\Models\FrontPageImages;
use App\Models\GiftVouchers;

class AdminLandingPageController extends Controller
{
    public function adminLandingPage(){

        $treatments = SingleSalonTreatment::all();
        $courses = TrainingCourse::all();
        $frontPageImages = FrontPageImages::all();
        $STEnquires = SingleSalonTreatment::where('enquires', '>', 0)->get();
        $stArray = [];
        foreach ($STEnquires as $enquiry) {
            array_push($stArray, $enquiry->enquires);
        }
        $mostPopularTreatment = SingleSalonTreatment::with('category')->orderBy('enquires', 'DESC')->where('enquires', '>', 0)->first();

        $TCEnquires = TrainingCourse::where('enquires', '>', 0)->get();
        $tcArray = [];
        foreach ($TCEnquires as $enquiry) {
            array_push($tcArray, $enquiry->enquires);
            
        }
        $mostPopularCourse = TrainingCourse::orderBy('enquires', 'DESC')->where('enquires', '>', 0)->first();
        $vouchers = GiftVouchers::all();

        return response()->json([
            'treatments' => count($treatments),
            'courses' => count($courses),
            'frontPageImages' => count($frontPageImages),
            'STEnquires' => array_sum($stArray),
            'TCEnquires' => array_sum($tcArray),
            'vouchers' => count($vouchers),
            'mostPopularTreatment' => $mostPopularTreatment,
            'mostPopularCourse' => $mostPopularCourse
            ]);
    }
}
