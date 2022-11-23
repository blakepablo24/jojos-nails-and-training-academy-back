<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendPaymentDetails extends FormRequest
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
            'totalCost' => 'required|numeric|between:0,9999.99',
            'basketItems' => 'nullable',
        ];
    }

    public function messages() {
        return [
            
        ];
    }
}
