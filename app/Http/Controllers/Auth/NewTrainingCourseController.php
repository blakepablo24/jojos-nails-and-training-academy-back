<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrainingCourse;
use App\Http\Requests\StoreNewTrainingCourse;
use Helper;

class NewTrainingCourseController extends Controller
{
    public function newTrainingCourse(StoreNewTrainingCourse $request) {

        $newTrainingCourse =  new TrainingCourse;
        $newTrainingCourse->title = ucwords($request->title);
        $newTrainingCourse->price = $request->price;
        $newTrainingCourse->duration = $request->duration;
        $newTrainingCourse->teacher_student_ratio = $request->teacher_student_ratio;
        $newTrainingCourse->start_time = "10am";
            if($request->duration === "Half Day") {
                $newTrainingCourse->end_time = "1pm";
            } else {
                $newTrainingCourse->end_time = "4pm";
            }
        $newTrainingCourse->extras = ucfirst($request->extras);
        $newTrainingCourse->prerequisites = ucwords($request->prerequisites);
        if($request->newImage){
            $newTrainingCourse->image = Helper::imageUpdate($request->newImage, '/images/training-course-images/', ucwords($request->title));
        } else {
            $newTrainingCourse->image = "";
        }
        $newTrainingCourse->save();

        return response()->json(['newTrainingCourse' => $newTrainingCourse]);
    }
}
