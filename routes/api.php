<?php

use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', 'App\Http\Controllers\UserController@login');
Route::get('/logout', 'App\Http\Controllers\UserController@logout');

Route::get('/get-front-page-images', 'App\Http\Controllers\FrontPageImagesController@getFrontPageImages');

Route::get('/all-training-courses', 'App\Http\Controllers\TrainingCourseController@getAllTrainingCourses');
Route::get('/single-training-course/{id}', 'App\Http\Controllers\TrainingCourseController@getSingleTrainingCourse');

Route::get('/all-salon-treatments', 'App\Http\Controllers\SalonTreatmentController@getAllSalonTreatments');
Route::get('/salon-treatments-sub-cat/{id}', 'App\Http\Controllers\SalonTreatmentController@getSubCatSalonTreatments');
Route::get('/single-salon-treatment/{id}', 'App\Http\Controllers\SalonTreatmentController@getSingletSalonTreatment');

Route::get('/single-salon-treatment/{id}', 'App\Http\Controllers\SalonTreatmentController@getSingletSalonTreatment');
Route::post('/new-booking-enquiry', 'App\Http\Controllers\BookingEnquiryController@newBookingEnquiry');

// Must be logged in to access to these routes
Route::middleware('auth:sanctum')->get('/admin-landing-page', 'App\Http\Controllers\Auth\AdminController@adminLandingPage');
Route::middleware('auth:sanctum')->delete('/delete-single-salon-treatment/{id}', 'App\Http\Controllers\Auth\AdminController@deleteSalonTreatment');
Route::middleware('auth:sanctum')->delete('/delete-single-training-course/{id}', 'App\Http\Controllers\Auth\AdminController@deleteTrainingCourse');
Route::middleware('auth:sanctum')->get('/get-salon-treatment-categories', 'App\Http\Controllers\Auth\AdminController@getSalonTreatmentCategories');
Route::middleware('auth:sanctum')->post('/new-salon-treatment', 'App\Http\Controllers\Auth\AdminController@newSalonTreatment');
Route::middleware('auth:sanctum')->post('/new-training-course', 'App\Http\Controllers\Auth\AdminController@newTrainingCourse');
Route::middleware('auth:sanctum')->post('/add-new-curriculum/{id}', 'App\Http\Controllers\Auth\AdminController@addNewCurriculum');
Route::middleware('auth:sanctum')->get('/get-salon-treatment-to-edit/{id}', 'App\Http\Controllers\Auth\AdminController@getSingleSalonTreatmentToEdit');
Route::middleware('auth:sanctum')->post('/update-salon-treatment', 'App\Http\Controllers\Auth\AdminController@updateSalonTreatment');
Route::middleware('auth:sanctum')->get('/get-training-course-to-edit/{id}', 'App\Http\Controllers\Auth\AdminController@getTrainingCourseToEdit');
Route::middleware('auth:sanctum')->post('/update-training-course', 'App\Http\Controllers\Auth\AdminController@updateTrainingCourse');
Route::middleware('auth:sanctum')->delete('/delete-salon-treatment-image/{id}', 'App\Http\Controllers\Auth\AdminController@deleteSalonTreatmentImage');
Route::middleware('auth:sanctum')->delete('/delete-training-course-image/{id}', 'App\Http\Controllers\Auth\AdminController@deleteTrainingCourseImage');
Route::middleware('auth:sanctum')->delete('/delete-training-course-image/{id}', 'App\Http\Controllers\Auth\AdminController@deleteTrainingCourseImage');
Route::middleware('auth:sanctum')->delete('/delete-front-page-image/{id}', 'App\Http\Controllers\Auth\AdminController@deleteFrontPageImage');
Route::middleware('auth:sanctum')->post('/add-new-front-page-image', 'App\Http\Controllers\Auth\AdminController@addNewFrontPageImage');