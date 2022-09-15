<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVoluntaryInfoRequest extends FormRequest
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
            'organization_name_address' => 'required',
            'voluntary_date_from' => 'required',
            'voluntary_date_to' => 'required',
            'number_of_hours' => 'required',
            'voluntary_jobtitle' => 'required',
        ];
    } // End Method

    public function messages()
    {
        return [
            'organization_name_address.required' => 'Voluntary Name & Address is required.',
            'voluntary_date_from.required' => 'Voluntary Inclusive Date From is required.',
            'voluntary_date_to.required' => 'Voluntary Inclusive Date To is required.',
            'number_of_hours.required' => 'Voluntary Number of Hours is required.',
            'voluntary_jobtitle.required' => 'Voluntary Position/Nature of Work is required.',
        ];
    } // End Method
}
