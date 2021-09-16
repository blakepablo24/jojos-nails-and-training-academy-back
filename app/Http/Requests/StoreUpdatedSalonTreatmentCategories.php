<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatedSalonTreatmentCategories extends FormRequest
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
            'categoryItems' => 'required|array|min:2'
            // "categoryItems.*"  => "required|string|distinct|min:3",
        ];
    }

    public function messages() {
        return [
            'categoryItems.required' => 'Curriculum items cannot be empty'
        ];
    }
}
