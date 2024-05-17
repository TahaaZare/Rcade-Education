<?php

namespace App\Http\Requests\Admin\Content\Blog;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
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
            'title' => ['required', 'max:150'],
            'category_id' => ['required', 'exists:blog_categories,id'],
            'description' => ['required'],
            'image' => ['sometimes', 'mimes:png,jpg,jpeg,gif,webp'],
            'status' => ['required', 'in:0,1'],
        ];
    }
}
