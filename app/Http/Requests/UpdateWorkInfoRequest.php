<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkInfoRequest extends FormRequest
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
            'work_date_from' => 'required',
            'work_date_to' => 'required',
            'job_title' => 'required',
            'monthly_salary' => 'required',
            'status_of_appointment' => 'required',
            'gov_service' => 'required',
        ];
    } // End Method

    public function messages()
    {
        return [
            'work_date_from.required' => 'Inclusive Date From is required.',
            'work_date_to.required' => 'Inclusive Date To is required.',
            'job_title.required' => 'Position Title is required.',
            'monthly_salary.required' => 'Job Type field is required.',
            'status_of_appointment.required' => 'Status of Appointment is required.',
            'gov_service.required' => 'Gov\'s Service is required.',
        ];
    } // End Method
}
