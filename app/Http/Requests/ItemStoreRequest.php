<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemStoreRequest extends FormRequest
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
            'title' => 'required|max:255',
            'type' => 'required|in:movie,series',
            'year' => 'nullable|integer|between:1900,2100',
            'status' => 'required|in:planned,watching,watched,dropped',
            'rating' => 'nullable|integer|between:0,10',
            'poster_url' => 'nullable|url',
            'notes' => 'nullable|max:1000'
        ];
    }
}
