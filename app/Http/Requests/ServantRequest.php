<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServantRequest extends FormRequest
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
            'enrollment' => 'required|string|max:9',
            'contract' => 'required|string|max:2',
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'active' => 'required|boolean'
        ];
    }
}