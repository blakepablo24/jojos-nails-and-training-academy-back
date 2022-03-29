<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewTrainingCourse extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'price' => 'required|numeric|between:0,999.99',
            'duration' => 'required|string',
            'extras' => 'nullable|string',
            'teacher_student_ratio' => 'required|string',
            'newImage' => 'required|image|mimes:jpeg,jpg,png,webp|max:5000'
        ];
    }

    public function messages() {
        return [
            'newImage.required' => 'An Image is required! ',
            'newImage.image' => 'Your uploaded file can only be of image type ',
            'newImage.mimes' => 'Image must be of jpeg, jpg or png format ',
            'newImage.max' => 'The image maximum size is 5MB! Please choose a smaller sized image.'
        ];
    }
}
