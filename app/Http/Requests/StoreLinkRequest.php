<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class StoreLinkRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return string[]
     */
    #[ArrayShape(['original_url' => "string"])]
    public function rules(): array
    {
        return [
            'original_url' => 'required|url',
        ];
    }

    /**
     * @return string[]
     */
    #[ArrayShape(['original_url.required' => "string", 'original_url.url' => "string"])]
    public function messages(): array
    {
        return [
            'original_url.required' => 'The original URL is required.',
            'original_url.url' => 'The original URL must be a valid URL.',
        ];
    }
}
