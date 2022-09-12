<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEducationalInfoRequest extends FormRequest
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
            'elementary_school' => 'required',
            'elementary_from' => 'required',
            'elementary_to' => 'required',
            'elementary_graduated' => 'required',

            'secondary_school' => 'required',
            'secondary_course' => 'required',
            'secondary_from' => 'required',
            'secondary_to' => 'required',
            'secondary_graduated' => 'required',

            'college_school' => 'required',
            'college_course' => 'required',
            'college_from' => 'required',
            'college_to' => 'required',
            'college_units' => 'required',
            'college_graduated' => 'required',
        ];
    } // End Method

    public function messages()
    {
        return [
            'elementary_school.required' => 'Elementary School Name is required.',
            'elementary_from.required' => 'Elementary Year From is required.',
            'elementary_to.required' => 'Elementary Year To is required.',
            'elementary_graduated.required' => 'Elementary Year Graduated is required.',

            'secondary_school.required' => 'Secondary School Name is required.',
            'secondary_course.required' => 'Secondary Strand/Track is required.',
            'secondary_from.required' => 'Secondary Year From is required.',
            'secondary_to.required' => 'Secondary Year To is required.',
            'secondary_graduated.required' => 'Secondary Year Graduated is required.',

            'college_school.required' => 'College School Name is required.',
            'college_course.required' => 'College Course is required.',
            'college_from.required' => 'College Year From is required.',
            'college_to.required' => 'College Year To is required.',
            'college_units.required' => 'College Units Earned is required.',
            'college_graduated.required' => 'College Year Graduated is required.',
        ];
    } // End Method
}
