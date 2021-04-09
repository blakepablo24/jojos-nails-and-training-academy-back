<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrainingCourse;
use App\Models\SingleSalonTreatment;
use App\Models\SalonTreatment;
use App\Models\CourseCurriculum;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreNewSalonTreatment;
use App\Http\Requests\StoreNewTrainingCourse;
use App\Http\Requests\StoreNewCurriculum;
use App\Http\Requests\StoreEditedSalonTreatment;
use App\Http\Requests\StoreEditedTrainingCourse;
use App\Http\Requests\StoreNewFrontPageImage;
use App\Models\FrontPageImages;

class AdminController extends Controller
{
    public function adminLandingPage(){

        $treatments = SingleSalonTreatment::all();
        $courses = TrainingCourse::all();
        $frontPageImages = FrontPageImages::all();

        return response()->json([
            'treatments' => count($treatments),
            'courses' => count($courses),
            'frontPageImages' => count($frontPageImages)
            ]);
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
            $newSalonTreatment->save();

            return response()->json(['newSalonTreatment' => $newSalonTreatment]);
        }

        return response()->json(['newSalonTreatment' => $newSalonTreatment]);
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
            }

            $salonTreatment->image = $this->imageUpdate($request->newImage, '/images/salon-treatment-images/single-salon-treatment-images/');
            $salonTreatment->save();

            return response()->json(['salonTreatment' => $salonTreatment]);
        }
        $salonTreatment->save();
        return response()->json(['salonTreatment' => $salonTreatment]);
    }

    public function deleteSalonTreatmentImage($id) {
        $salonTreatment = SingleSalonTreatment::find($id);
        Storage::delete('/public/images/salon-treatment-images/single-salon-treatment-images/'.$salonTreatment->image);
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
            }
            $trainingCourse->image = $this->imageUpdate($request->newImage, '/images/training-course-images/');
            $trainingCourse->save();
            return response()->json(['trainingCourse' => $trainingCourse]);
        }

        $trainingCourse->save();
        return response()->json(['trainingCourse' => $trainingCourse]);
    }

    public function deleteTrainingCourseImage($id) {

        $trainingCourse = TrainingCourse::find($id);
        Storage::delete('/public/images/training-course-images/'.$trainingCourse->image);
        $trainingCourse->image = "";
        $trainingCourse->save();

        return response()->json(['trainingCourse' => $trainingCourse]);
    }

    public function deleteFrontPageImage($id){
        $frontPageImage = FrontPageImages::find($id);
        Storage::delete('/public/images/front-page-images/landing-page-images/'.$frontPageImage->image);
        $frontPageImage->delete();
    }

    public function addNewFrontPageImage(StoreNewFrontPageImage $request){
        $frontPageImage = new FrontPageImages;
        $frontPageImage->image = $this->imageUpdate($request->newImage, '/images/front-page-images/landing-page-images/');
        $frontPageImage->save();
    }

    private function imageUpdate($image, $fileLocation){
            \Tinify\setKey("gpYyPbcWHr93Cjtx9rm87xV2pMDrpch6");
        
            $storagePath  = Storage::disk('public')->getDriver()->getAdapter()->getPathPrefix();
            $filename = $image->getClientOriginalName();

            $image->storeAs($fileLocation, $filename, 'public');
            
            $source = \Tinify\fromFile($storagePath.$fileLocation.$filename);
            $source->toFile($storagePath.$fileLocation.$filename);
            return $filename;
    }
}