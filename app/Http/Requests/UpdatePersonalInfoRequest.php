<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePersonalInfoRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'middle_name' => 'required',
            'dob' => 'required',
            'pob' => 'required',
            'gender' => 'required',
            'civil_status' => 'required',
            'height' => 'required',
            'weight' => 'required',
            'blood_type' => 'required',
            'gsis_id_no' => 'required',
            'pagibig_id_no' => 'required',
            'philhealth_no' => 'required',
            'sss_no' => 'required',
            'tin_no' => 'required',
            'agency_employee_no' => 'required',

            'citizenship_country' => 'required',
            'r_house_no' => 'required',
            'r_street' => 'required',
            'r_subdivision' => 'required',
            'r_barangay' => 'required',
            'r_city' => 'required',
            'r_province' => 'required',
            'r_zip_code' => 'required|numeric',
            'p_house_no' => 'required',
            'p_street' => 'required',
            'p_subdivision' => 'required',
            'p_barangay' => 'required',
            'p_city' => 'required',
            'p_province' => 'required',
            'p_zip_code' => 'required|numeric',
            'mobile' => 'required|numeric',
        ];
    } // End Method

    public function messages()
    {
        return [
            'first_name.required' => 'Firstname field is required.',
            'last_name.required' => 'Lastname field is required.',
            'middle_name.required' => 'Middlename field is required.',
            'dob.required' => 'Date of birth field is required.',
            'pob.required' => 'Place of birth field is required.',
            'gender.required' => 'Sex is required.',
            'civil_status.required' => 'Civil Status is required.',
            'height.required' => 'Height field is required.',
            'weight.required' => 'Weight field is required.',
            'blood_type.required' => 'Blood Type field is required.',
            'gsis_id_no.required' => 'GSIS ID No. field is required.',
            'pagibig_id_no.required' => 'PAGIBIG ID No. field is required.',
            'philhealth_no.required' => 'PHILHEALTH No. field is required.',
            'sss_no.required' => 'SSS No. field is required.',
            'tin_no.required' => 'TIN No. field is required.',
            'agency_employee_no.required' => 'Agency Employee No. field is required.',

            'citizenship_country.required' => 'Citizenship Country is required.',
            'r_house_no.required' => 'House No. field is required.',
            'r_street.required' => 'Street field is required.',
            'r_subdivision.required' => 'Subdivision field is required.',
            'r_barangay.required' => 'Barangay field is required.',
            'r_city.required' => 'City field is required.',
            'r_province.required' => 'Province field is required.',
            'r_zip_code.required' => 'Zip Code field is required.',
            'r_zip_code.numeric' => 'Zip Code must be a number.',
            'p_house_no.required' => 'House No. field is required.',
            'p_street.required' => 'Street field is required.',
            'p_subdivision.required' => 'Subdivision field is required.',
            'p_barangay.required' => 'Barangay field is required.',
            'p_city.required' => 'City field is required.',
            'p_province.required' => 'Province field is required.',
            'p_zip_code.required' => 'Zip Code field is required.',
            'p_zip_code.numeric' => 'Zip Code must be a number.',
            'mobile.required' => 'Mobile field is required.',
            'mobile.numeric' => 'Mobile must be a number.',
        ];
    }
}
