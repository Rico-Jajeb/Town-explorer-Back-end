<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SystemInfoRequest extends FormRequest
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
            'system_name' => 'required|string|max:255',
            'system_slogan1' => 'nullable|string|max:255',
            'system_slogan2' => 'nullable|string|max:255',
            'facebook_link' => 'nullable|string|max:255',
            'email_link' => 'nullable|string|max:255',
            'number' => 'nullable|string|max:50',
            'system_logo' => 'nullable|string|max:255',
            'background_img' => 'nullable|string|max:255',
        ];
    }
}
