<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdatePostRequest
 * @package App\Http\Requests
 */
class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true; 
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
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