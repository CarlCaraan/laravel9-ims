<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOtherInfoRequest extends FormRequest
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
            'special_skill' => 'required',
            'recognition' => 'required',
            'organization' => 'required',
        ];
    } // End Method

    public function messages()
    {
        return [
            'special_skill.required' => 'Special Skill is required.',
            'recognition.required' => 'Other Recognition is required.',
            'organization.required' => 'Other Organization is required.',
        ];
    } // End Method
}
