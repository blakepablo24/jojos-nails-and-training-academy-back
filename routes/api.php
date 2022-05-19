<?php

use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', 'App\Http\Controllers\UserController@login');
Route::get('/logout', 'App\Http\Controllers\UserController@logout');

Route::get('/get-front-page-images', 'App\Http\Controllers\FrontPageImagesController@getFrontPageImages');
Route::get('/get-all-front-page-images', 'App\Http\Controllers\FrontPageImagesController@getAllFrontPageImages');

Route::get('/all-training-courses', 'App\Http\Controllers\TrainingCourseController@getAllTrainingCourses');
Route::get('/single-training-course/{id}', 'App\Http\Controllers\TrainingCourseController@getSingleTrainingCourse');

// Salon Treatment Categories
Route::get('/get-salon-treatment-categories', 'App\Http\Controllers\SalonTreatmentCategoryController@getSalonTreatmentCategories');

// Salon Treatments
Route::get('/all-salon-treatments', 'App\Http\Controllers\SalonTreatmentController@getAllSalonTreatments');
Route::get('/salon-treatments-sub-cat/{id}', 'App\Http\Controllers\SalonTreatmentController@getSubCatSalonTreatments');
Route::get('/single-salon-treatment/{id}', 'App\Http\Controllers\SalonTreatmentController@getSingletSalonTreatment');

Route::post('/new-booking-enquiry', 'App\Http\Controllers\BookingEnquiryController@newBookingEnquiry');

// Facebook Reviews
Route::get('/get-fbk', 'App\Http\Controllers\ReviewController@getFacebookReviews');
Route::get('/get-gac', 'App\Http\Controllers\ReviewController@getGAC');

// Must be logged in to access to these routes
// Admin Landing page
Route::middleware('auth:sanctum')->get('/admin-landing-page', 'App\Http\Controllers\Auth\AdminLandingPageController@adminLandingPage');

// Admin New Salon Streatment
Route::middleware('auth:sanctum')->post('/new-salon-treatment', 'App\Http\Controllers\Auth\NewSalonTreatmentController@newSalonTreatment');

// Admin Edit Salon Treatment
Route::middleware('auth:sanctum')->get('/get-salon-treatment-to-edit/{id}', 'App\Http\Controllers\Auth\EditSalonTreatmentController@getSingleSalonTreatmentToEdit');
Route::middleware('auth:sanctum')->post('/update-salon-treatment', 'App\Http\Controllers\Auth\EditSalonTreatmentController@updateSalonTreatment');
Route::middleware('auth:sanctum')->delete('/delete-salon-treatment-image/{id}', 'App\Http\Controllers\Auth\EditSalonTreatmentController@deleteSalonTreatmentImage');
Route::middleware('auth:sanctum')->delete('/delete-single-salon-treatment/{id}', 'App\Http\Controllers\Auth\EditSalonTreatmentController@deleteSalonTreatment');

//  Admin Salon Treatment Categories
Route::middleware('auth:sanctum')->post('/add-edit-salon-treatment-category', 'App\Http\Controllers\Auth\AddEditSalonTreatmentCategoryController@addEditSalonTreatmentCategory');
Route::middleware('auth:sanctum')->delete('/delete-salon-treatment-category/{id}', 'App\Http\Controllers\Auth\AddEditSalonTreatmentCategoryController@deleteSalonTreatmentCategory');
Route::middleware('auth:sanctum')->post('/update-salon-treatment-category-image', 'App\Http\Controllers\Auth\AddEditSalonTreatmentCategoryController@updateSalonTreatmentCategoryImage');

// Admin New Training Course
Route::middleware('auth:sanctum')->post('/new-training-course', 'App\Http\Controllers\Auth\NewTrainingCourseController@newTrainingCourse');

// Admin Edit Training Course
Route::middleware('auth:sanctum')->get('/get-training-course-to-edit/{id}', 'App\Http\Controllers\Auth\EditTrainingCourseController@getTrainingCourseToEdit');
Route::middleware('auth:sanctum')->post('/update-training-course', 'App\Http\Controllers\Auth\EditTrainingCourseController@updateTrainingCourse');
Route::middleware('auth:sanctum')->delete('/delete-training-course-image/{id}', 'App\Http\Controllers\Auth\EditTrainingCourseController@deleteTrainingCourseImage');
Route::middleware('auth:sanctum')->post('/add-new-curriculum/{id}', 'App\Http\Controllers\Auth\EditTrainingCourseController@addNewCurriculum');
Route::middleware('auth:sanctum')->delete('/delete-single-training-course/{id}', 'App\Http\Controllers\Auth\EditTrainingCourseController@deleteTrainingCourse');

// Admin Gift Vouchers
Route::middleware('auth:sanctum')->get('/get-all-gift-vouchers', 'App\Http\Controllers\Auth\GiftVoucherController@getAllGiftVouchers');
Route::middleware('auth:sanctum')->delete('/delete-pending-gift-voucher/{id}', 'App\Http\Controllers\Auth\GiftVoucherController@deletePendingGiftVoucher');
Route::middleware('auth:sanctum')->post('/approve-pending-gift-voucher/{id}', 'App\Http\Controllers\Auth\GiftVoucherController@approvePendingGiftVoucher');

// Admin Front Page Images
Route::middleware('auth:sanctum')->delete('/delete-front-page-image/{id}', 'App\Http\Controllers\Auth\EditFrontPageImageController@deleteFrontPageImage');
Route::middleware('auth:sanctum')->post('/add-new-front-page-image', 'App\Http\Controllers\Auth\EditFrontPageImageController@addNewFrontPageImage');

// Admin Change Password
Route::middleware('auth:sanctum')->post('/admin-change-password', 'App\Http\Controllers\Auth\ChangePasswordController@adminChangePassword');
