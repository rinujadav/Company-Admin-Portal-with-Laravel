<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => ['required', 'regex:/^[0-9]{10}$/'],
            'company_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'Please enter a first name.',
            'last_name.required' => 'Please enter a last name.',
            'email.required' => 'Please enter email.',
            'email.email' => 'Please enter a valid email address.',
            'phone.required' => 'Please enter phone number.',
            'phone.regex' => 'Invalid Number.',
            'company_id.required' => 'Select Company.',
        ];
    }
}
