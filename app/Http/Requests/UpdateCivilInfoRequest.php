<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCivilInfoRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'cse_type' => 'required',
            'cse_date' => 'required',
            'cse_place' => 'required',
            'cse_license_number' => 'required',
            'cse_license_date' => 'required',
        ];
    } // End Method

    public function messages()
    {
        return [
            'cse_type.required' => 'Civil Service field is required.',
            'cse_date.required' => 'Civil Examination Date is required.',
            'cse_place.required' => 'Civil Examination Place is required.',
            'cse_license_number.required' => 'Civil License No. is required.',
            'cse_license_date.required' => 'Civil License Date is required.',
        ];
    } // End Method
}
