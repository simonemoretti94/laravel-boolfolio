<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreProjectRequest extends FormRequest
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
        if (Str::startsWith($this->cover_image, 'https://')) {
            $validation = 'url';
        } else {
            $validation = 'image|max:1024';
        }
        return [
            'title' => 'required|min:6',
            'description' => 'required|min:20',
            'cover_image' => 'nullable|'.$validation,
            'slug' => 'nullable',
        ];
    }
}
