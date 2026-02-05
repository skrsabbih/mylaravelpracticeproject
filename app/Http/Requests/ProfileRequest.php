<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // profile validation rules
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
            'phone' => 'nullable|string|max:11',
            'address' => 'nullable|string|max:500',
            'document' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
        ];
    }
}
