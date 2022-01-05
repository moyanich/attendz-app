<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeJobHistoryRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'job' => 'required',
            'department' => 'required',
            'start' => 'required',
            'end' => 'nullable|date|after_or_equal:start',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'job.required' => 'Jobtitle field is required',
            'start.required' => 'Start date field is required',
            'end.date' => 'End date field is not a valid date',
            'end.after_or_equal' => 'End date must be a date after or equal to start.',
        ];
    }
    
}

