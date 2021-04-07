<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrainingCourse;

class TrainingCourseController extends Controller
{
    public function getAllTrainingCourses()
    {
        $trainingCourses = TrainingCourse::all();

        return response()->json($trainingCourses);
    }

    public function getSingleTrainingCourse($id)
    {

        $singleTrainingCourse = TrainingCourse::with('courseCurriculum')->find($id);

        return $singleTrainingCourse;

    }
}
