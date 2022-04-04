<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrainingCourse;
use App\Models\SingleSalonTreatment;
use App\Models\SalonTreatment;
use App\Models\CourseCurriculum;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreNewSalonTreatment;
use App\Http\Requests\StoreNewTrainingCourse;
use App\Http\Requests\StoreNewCurriculum;
use App\Http\Requests\StoreEditedSalonTreatment;
use App\Http\Requests\StoreEditedTrainingCourse;
use App\Http\Requests\StoreNewFrontPageImage;
use App\Http\Requests\StoreUpdatedSalonTreatmentCategories;
use App\Http\Requests\StoreEditedSalonTreatmentCategoryImage;
use App\Http\Requests\Auth\StoreChangedPassword;
use App\Models\FrontPageImages;
use App\Models\Enquires;
use App\Models\GiftVouchers;
use App\Models\EnquiryDetails;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApprovedVoucher;
use PDF;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
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

    public function adminChangePassword(StoreChangedPassword $request){

        $user = User::find($request->id);

        if (Hash::check($request->current, $user->password)) {
            $user->password = bcrypt($request->new);
            $user->save();
            return true;
        } else {
            return false;
        }
    }

    public function deleteSalonTreatment($id){
        
        $treatmentToDelete = SingleSalonTreatment::find($id);

        if($treatmentToDelete->image){
            Storage::delete('/public/images/salon-treatment-images/single-salon-treatment-images/'.$treatmentToDelete->image);
        }

        $treatmentToDelete->delete();

        return response()->json(['message' => 'Treatment Successfully Deleted']);

    }

    public function deleteTrainingCourse($id){
        
        $courseToDelete = TrainingCourse::find($id);

        if($courseToDelete->image){
            Storage::delete('/public/images/training-course-images/'.$courseToDelete->image);
        }

        $courseToDelete->delete();

        return response()->json(['message' => 'Training Course Successfully Deleted']);
    }

    public function getSalonTreatmentCategories() {
        
        $categories = SalonTreatment::all();

        return response()->json(['categories' => $categories]);
    }

    public function newSalonTreatment(StoreNewSalonTreatment $request) {

        $newSalonTreatment =  new SingleSalonTreatment;
        $newSalonTreatment->category = $request->category;
        $newSalonTreatment->title = $request->title;
        $newSalonTreatment->price = $request->price;
        $newSalonTreatment->duration = $request->duration;
        $newSalonTreatment->description = $request->description;

        if($request->newImage){
            $newSalonTreatment->image = $this->imageUpdate($request->newImage, '/images/salon-treatment-images/single-salon-treatment-images/');
        } else {
            $newSalonTreatment->image = "";
        }

        $newSalonTreatment->save();

        return response()->json(['newSalonTreatment' => $newSalonTreatment]);
    }

    public function addEditSalonTreatmentCategory(StoreUpdatedSalonTreatmentCategories $request) {
        $firstMessage = "";
        $secondMessage = "";
        foreach ($request->categoryItems as $category) {
            if($category["id"] != ""){
                $salonTreatmentCategory = SalonTreatment::find($category["id"]);

                if($category["title"] != $salonTreatmentCategory->title){
                    $salonTreatmentCategory->title = $category["title"];
                    $salonTreatmentCategory->save();
                }
                $firstMessage = "edited";
            } else {
                $newSalonTreatmentCategory = new SalonTreatment;
                $newSalonTreatmentCategory->title = $category["title"];
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
            Storage::delete('/public/images/salon-treatment-images/'.$salonTreatmentCategory->image);
        }
        $salonTreatmentCategory->image = $this->imageUpdate($request->newImage, '/images/salon-treatment-images/');
        $salonTreatmentCategory->save();

        return $salonTreatmentCategory;

    }

    public function deleteSalonTreatmentCategory($id){
        $salonTreatmentCategory = SalonTreatment::find($id);
        if($salonTreatmentCategory->image != "default"){
            Storage::delete('/public/images/salon-treatment-images/'.$salonTreatmentCategory->image);
        }
        $salonTreatmentCategory->image = "";
        $salonTreatmentCategory->delete();
    }

    public function newTrainingCourse(StoreNewTrainingCourse $request) {

        $newTrainingCourse =  new TrainingCourse;
        $newTrainingCourse->title = $request->title;
        $newTrainingCourse->price = $request->price;
        $newTrainingCourse->duration = $request->duration;
        $newTrainingCourse->teacher_student_ratio = $request->teacher_student_ratio;
        $newTrainingCourse->start_time = "10am";
        if($request->duration === "Half Day") {
            $newTrainingCourse->end_time = "1pm";
        } else {
            $newTrainingCourse->end_time = "4pm";
        }

        $newTrainingCourse->image = $this->imageUpdate($request->newImage, '/images/training-course-images/');
        $newTrainingCourse->save();

        return response()->json(['newTrainingCourse' => $newTrainingCourse]);
    }

    public function addNewCurriculum($id, StoreNewCurriculum $request) {

        $existingCurriculumItems = CourseCurriculum::where('course', $id)->get();

        if(count($existingCurriculumItems) > 0){
            foreach ($existingCurriculumItems as $existingCurriculumItem) {
                $existingCurriculumItem->delete();
            }
        }

        $curriculumItems = $request->curriculumItems;

        foreach ($curriculumItems as $curriculumItem) {
            $item = new CourseCurriculum;
            $item->course = TrainingCourse::find($id)->id;
            $item->course_curriculum_item = $curriculumItem;
            $item->save();
        }

        return response()->json(['completed successfully']);
    }

    public function getSingleSalonTreatmentToEdit($id) {

        $categories = $this->getSalonTreatmentCategories();
        $salonTreatment = SingleSalonTreatment::find($id);

        return response()->json(['salonTreatment' => $salonTreatment, 'categories' => $categories]);
    }

    public function updateSalonTreatment(StoreEditedSalonTreatment $request){

        $salonTreatment = SingleSalonTreatment::find($request->id);
        $salonTreatment->category = $request->category;
        $salonTreatment->title = $request->title;
        $salonTreatment->price = $request->price;
        $salonTreatment->duration = $request->duration;
        $salonTreatment->description = $request->description;
        if($request->newImage){
            if($salonTreatment->image){
                Storage::delete('/public/images/salon-treatment-images/single-salon-treatment-images/'.$salonTreatment->image);
                Storage::delete('/public/images/salon-treatment-images/single-salon-treatment-images/-small'.$salonTreatment->image);
            }
            $salonTreatment->image = $this->imageUpdate($request->newImage, '/images/salon-treatment-images/single-salon-treatment-images/');
            $salonTreatment->save();
            return response()->json(['salonTreatment' => $salonTreatment]);
        }
        if($salonTreatment->image){
            if($this->checkIfImageisWebp($salonTreatment->image, '/images/salon-treatment-images/single-salon-treatment-images/')){
                $originalImage = $salonTreatment->image;
                $salonTreatment->image = $this->checkIfImageisWebp($salonTreatment->image, '/images/salon-treatment-images/single-salon-treatment-images/');
                Storage::delete('/images/salon-treatment-images/single-salon-treatment-images/'.$originalImage);
                Storage::delete('/images/salon-treatment-images/single-salon-treatment-images/-small'.$originalImage);
            }
        }
        $salonTreatment->save();
        return response()->json(['salonTreatment' => $salonTreatment]);
    }

    public function deleteSalonTreatmentImage($id) {
        $salonTreatment = SingleSalonTreatment::find($id);
        Storage::delete('/public/images/salon-treatment-images/single-salon-treatment-images/'.$salonTreatment->image);
        Storage::delete('/public/images/salon-treatment-images/single-salon-treatment-images/-small'.$salonTreatment->image);
        $salonTreatment->image = "";
        $salonTreatment->save();

        return response()->json(['salonTreatment' => $salonTreatment]);
    }

    public function getTrainingCourseToEdit($id) {

        $trainingCourse = TrainingCourse::find($id);

        return response()->json(['trainingCourse' => $trainingCourse]);
    }

    public function updateTrainingCourse(StoreEditedTrainingCourse $request){

        $trainingCourse =  TrainingCourse::find($request->id);
        $trainingCourse->title = $request->title;
        $trainingCourse->price = $request->price;
        $trainingCourse->duration = $request->duration;
        $trainingCourse->teacher_student_ratio = $request->teacher_student_ratio;
        $trainingCourse->start_time = "10am";
        if($request->duration === "Half Day") {
            $trainingCourse->end_time = "1pm";
        } else {
            $trainingCourse->end_time = "4pm";
        }
        if($request->newImage){
            if($trainingCourse->image){
                Storage::delete('/public/images/training-course-images/'.$trainingCourse->image);
                Storage::delete('/public/images/training-course-images/-small'.$trainingCourse->image);
            }
            $trainingCourse->image = $this->imageUpdate($request->newImage, '/images/training-course-images/');
            $trainingCourse->save();
            return response()->json(['trainingCourse' => $trainingCourse]);
        }
        if($trainingCourse->image){
            if($this->checkIfImageisWebp($trainingCourse->image, '/images/training-course-images/')){
                $originalImage = $trainingCourse->image;
                $trainingCourse->image = $this->checkIfImageisWebp($trainingCourse->image, '/images/training-course-images/');
                Storage::delete('/public/images/training-course-images/'.$originalImage);
                Storage::delete('/public/images/training-course-images/-small'.$originalImage);
            }
        }
        $trainingCourse->extras = $request->extras;
        $trainingCourse->save();
        return response()->json(['trainingCourse' => $trainingCourse]);
    }

    public function deleteTrainingCourseImage($id) {

        $trainingCourse = TrainingCourse::find($id);
        Storage::delete('/public/images/training-course-images/'.$trainingCourse->image);
        Storage::delete('/public/images/training-course-images/small-'.$trainingCourse->image);
        $trainingCourse->image = "";
        $trainingCourse->save();

        return response()->json(['trainingCourse' => $trainingCourse]);
    }

    public function deleteFrontPageImage($id){
        $frontPageImage = FrontPageImages::find($id);
        Storage::delete('/public/images/front-page-images/landing-page-images/'.$frontPageImage->image);
        Storage::delete('/public/images/front-page-images/landing-page-images/'.$frontPageImage->image);
        $frontPageImage->delete();
    }

    public function addNewFrontPageImage(StoreNewFrontPageImage $request){
        $frontPageImage = new FrontPageImages;
        $frontPageImage->image = $this->imageUpdate($request->newImage, '/images/front-page-images/landing-page-images/');
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

    public function getAllGiftVouchers(){

        $pendingGiftVouchers = GiftVouchers::where('pending', true)->get();
        $unRedeemedGiftVouchers = GiftVouchers::where('pending', false)->where('redeemed', false)->get();
        $redeemedGiftVouchers = GiftVouchers::where('pending', false)->where('redeemed', true)->get();


        return response()->json([
            'pending' => ['vouchers' => $pendingGiftVouchers, 'title' => 'pending'],
            'unredeemed' => ['vouchers' => $unRedeemedGiftVouchers, 'title' => 'unredeemed'],
            'redeemed' => ['vouchers' => $redeemedGiftVouchers, 'title' => 'redeemed']
        ]);
    }

    public function deletePendingGiftVoucher($id) {
        $pendingGiftVoucher = GiftVouchers::find($id);
        $pendingGiftVoucher->delete();
    }

    public function approvePendingGiftVoucher($id) {
        $pendingGiftVoucher = GiftVouchers::find($id);
        $pendingGiftVoucher->pending = false;
        $pendingGiftVoucher->expiry_date = date('d-m-Y', strtotime('+1 year'));
        // $pendingGiftVoucher->save();

        $pdf = PDF::loadView('approved-voucher-to-pdf', $pendingGiftVoucher)->setPaper('a4', 'landscape');
        Storage::put('public/vouchers/'.$pendingGiftVoucher->name." - ".$pendingGiftVoucher->id.'.pdf', $pdf->output());

        // Mail::to($pendingGiftVoucher['email'])->send(new ApprovedVoucher($pendingGiftVoucher));
    }

    public function getFacebookReviews() {
        $url = "https://graph.facebook.com/v12.0/me?fields=id%2Cname%2Coverall_star_rating%2Cpicture%7Burl%7D%2Crating_count%2Cratings%7Bcreated_time%2Creview_text%2Crating%2Creviewer%7Bid%2Cfirst_name%2Cprofile_pic%7D%7D&access_token=";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url.config('app.fbac'));
        // SSL important
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $output = curl_exec($ch);
        curl_close($ch);

        return $this -> response['response'] = json_decode($output);
    }

    public function getGAC() {
        return config('app.gac');
    }

    private function checkIfImageisWebp($image, $fileLocation) {
        $storagePath  = Storage::disk('public')->getDriver()->getAdapter()->getPathPrefix();
        $originalImage = $storagePath.$fileLocation.$image;
        $info = pathinfo($storagePath.$fileLocation.$image);
        if ($info["extension"] != "webp") {
            \Tinify\setKey("gpYyPbcWHr93Cjtx9rm87xV2pMDrpch6");

            $filename = pathinfo($storagePath.$fileLocation.$image, PATHINFO_FILENAME);
            $newFileName = $filename.'.webp';
            $storagePath  = Storage::disk('public')->getDriver()->getAdapter()->getPathPrefix();
            $image = imagecreatefromstring(file_get_contents($storagePath.$fileLocation.$image));
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
            $source->toFile($storagePath.$fileLocation.$newFileName);
            return $newFileName;
        } else {
            return false;
        }
    }

    private function imageUpdate($image, $fileLocation){
            \Tinify\setKey("gpYyPbcWHr93Cjtx9rm87xV2pMDrpch6");

            $filename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
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
}