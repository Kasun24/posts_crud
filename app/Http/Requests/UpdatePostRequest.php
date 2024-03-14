<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Assuming you have appropriate authorization logic in place
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {

        return [
            'title' => 'required|string|max:255|unique:posts,title,'.$this->post->id,
            'body' => 'required|string',
            'published_date' => 'nullable|date',
            'status' => 'required|in:published,unpublished', 
        ];
    }
}
