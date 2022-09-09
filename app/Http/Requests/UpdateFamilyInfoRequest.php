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
        ];
    } // End Method

    public function messages()
    {
        return [
            'spouse_lname.required' => 'Spouse\'s Surname field is required.',
        ];
    }
}
