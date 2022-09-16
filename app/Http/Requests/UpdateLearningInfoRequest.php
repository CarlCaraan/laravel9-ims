<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLearningInfoRequest extends FormRequest
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
            'learning_title' => 'required',
            'learning_date_from' => 'required',
            'learning_date_to' => 'required',
            'learning_hours' => 'required',
            'ld_type' => 'required',
            'conducted_by' => 'required',
        ];
    } // End Method

    public function messages()
    {
        return [
            'learning_title.required' => 'Learning Program Title is required.',
            'learning_date_from.required' => 'Learning Inclusive Date From is required.',
            'learning_date_to.required' => 'Learning Inclusive To is required.',
            'learning_hours.required' => 'Learning Number of Hours is required.',
            'ld_type.required' => 'LD Type is required.',
            'conducted_by.required' => 'Conducted By field is required.',
        ];
    } // End Method
}
