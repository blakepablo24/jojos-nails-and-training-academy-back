<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewCurriculum extends FormRequest
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
            'curriculumItems' => 'required|array|min:2',
            "curriculumItems.*"  => "required|string|distinct|min:3",
        ];
    }

    public function messages() {
        return [
            'curriculumItems.required' => 'Curriculum items cannot be empty'
        ];
    }
}
