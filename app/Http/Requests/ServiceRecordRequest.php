<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRecordRequest extends FormRequest
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
            'sr_from' => 'required',
            'sr_to' => 'required',
            'sr_designation' => 'required',
            'sr_status' => 'required',
            'sr_salary' => 'required',
            'sr_place_of_assignment' => 'required',
            'sr_branch' => 'required',
        ];
    } // End Method

    public function messages()
    {
        return [
            'sr_from.required' => 'Service from is required',
            'sr_to.required' => 'Service to is required',
            'sr_designation.required' => 'Service designation is required',
            'sr_status.required' => 'Status is required',
            'sr_salary.required' => 'Annual salary is required',
            'sr_place_of_assignment.required' => 'Place of assignment is required',
            'sr_branch.required' => 'Branch is required',
        ];
    } // End Method
}
