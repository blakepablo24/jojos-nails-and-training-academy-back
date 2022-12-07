<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewCustomerBookingEnquiry extends FormRequest
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
            'itemsInBasket' => 'required|array',
            'treatmentsStartdate' => 'nullable|string',
            'trainingCourseStartdate' => 'nullable|string',
            'name' => 'required|string',
            'email' => 'required|email',
            'number' => 'required|string',
            'time' => 'nullable|string',
            'totalCost' => 'required|numeric|between:0,9999.99',
            'TC' => 'boolean',
            'ST' => 'boolean',
            'gift_voucher' => 'boolean'
        ];
    }

    public function messages() {
        return [
            
        ];
    }

}
