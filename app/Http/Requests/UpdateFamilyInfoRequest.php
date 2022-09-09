<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFamilyInfoRequest extends FormRequest
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
            'spouse_lname' => 'required',
            'spouse_fname' => 'required',
            'spouse_mname' => 'required',
            'telephone' => 'required',

            'father_lname' => 'required',
            'father_fname' => 'required',
            'father_mname' => 'required',

            'mother_lname' => 'required',
            'mother_fname' => 'required',
            'mother_mname' => 'required',
            'mother_maiden_name' => 'required',
        ];
    } // End Method

    public function messages()
    {
        return [
            'spouse_lname.required' => 'Spouse\'s Surname field is required.',
            'spouse_fname.required' => 'Spouse\'s Firstname field is required.',
            'spouse_mname.required' => 'Spouse\'s Middlename field is required.',
            'occupation.required' => 'Spouse\'s Occupation is required.',

            'father_lname.required' => 'Father\'s Surname is required.',
            'father_fname.required' => 'Father\'s Firstname is required.',
            'father_mname.required' => 'Father\'s Middlename is required.',

            'mother_lname.required' => 'Mother\'s Surname is required.',
            'mother_fname.required' => 'Mother\'s Firstname is required.',
            'mother_mname.required' => 'Mother\'s Middlename is required.',
            'mother_maiden_name.required' => 'Mother\'s Maiden Name is required.',
        ];
    }
}
