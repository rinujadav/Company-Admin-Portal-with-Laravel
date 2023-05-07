<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyStoreRequest extends FormRequest
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
            'name'      => 'required',
            'email'     => 'required|email',
            'logo'      => 'required|image|mimes:jpeg,png,jpg,gif|dimensions:min_width=100,min_height=100',
            'website'   => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter a first name.',
            'email.required' => 'Please enter email.',
            'email.email' => 'Please enter a valid email address.',
            'logo.required' => 'Please upload a company logo.',
            'logo.image' => 'The uploaded file must be an image.',
            'logo.mimes' => 'Only JPEG, PNG, JPG and GIF images are allowed.',
            'logo.dimensions' => 'The logo must not be larger 100*100.',
            'website.required' => 'Please enter a Website.',
        ];
    }

}
