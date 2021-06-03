<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewSalonTreatment extends FormRequest
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
            'category' => 'required|integer',
            'title' => 'required|string',
            'price' => 'required|integer',
            'duration' => 'required|integer',
            'description' => 'required|string',
            'newImage' => 'image|mimes:jpeg,jpg,png|max:5000'
        ];
    }

    public function messages() {
        return [
            'newImage.image' => 'Your uploaded file can only be of image type ',
            'newImage.mimes' => 'Image must be of jpeg, jpg or png format ',
            'newImage.max' => 'The image maximum size is 5MB! Please choose a smaller sized image.'
        ];
    }

}