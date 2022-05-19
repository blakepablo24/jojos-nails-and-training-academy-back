<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrainingCourse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreEditedTrainingCourse;
use App\Http\Requests\StoreNewCurriculum;
use App\Models\CourseCurriculum;
use Helper;

class EditTrainingCourseController extends Controller
{

    public function getTrainingCourseToEdit($id) {

        $trainingCourse = TrainingCourse::find($id);

        return response()->json(['trainingCourse' => $trainingCourse]);
    }

    public function updateTrainingCourse(StoreEditedTrainingCourse $request){

        $trainingCourse =  TrainingCourse::find($request->id);
        $trainingCourse->title = ucwords($request->title);
        $trainingCourse->price = $request->price;
        $trainingCourse->duration = $request->duration;
        $trainingCourse->teacher_student_ratio = $request->teacher_student_ratio;
        $trainingCourse->prerequisites = ucwords($request->prerequisites);
        $trainingCourse->start_time = "10am";
        $trainingCourse->extras = ucfirst($request->extras);
        if($request->duration === "Half Day") {
            $trainingCourse->end_time = "1pm";
        } else {
            $trainingCourse->end_time = "4pm";
        }
        if($request->newImage){
            if($trainingCourse->image){
                Helper::imageDelete('/public/images/training-course-images/', $trainingCourse->image);
            }
            $trainingCourse->image = Helper::imageUpdate($request->newImage, '/images/training-course-images/', ucwords($request->title));
            $trainingCourse->save();
            return response()->json(['trainingCourse' => $trainingCourse]);
        }
        $trainingCourse->save();
        return response()->json(['trainingCourse' => $trainingCourse]);
    }

    public function deleteTrainingCourseImage($id) {

        $trainingCourse = TrainingCourse::find($id);
        Helper::imageDelete('/public/images/training-course-images/', $trainingCourse->image);
        $trainingCourse->image = "";
        $trainingCourse->save();

        return response()->json(['trainingCourse' => $trainingCourse]);
    }

    public function deleteTrainingCourse($id){
        
        $trainingCourse = TrainingCourse::find($id);

        if($trainingCourse->image){
            Helper::imageDelete('/public/images/training-course-images/', $trainingCourse->image);
        }

        $trainingCourse->delete();

        return response()->json(['message' => 'Training Course Successfully Deleted']);
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
}