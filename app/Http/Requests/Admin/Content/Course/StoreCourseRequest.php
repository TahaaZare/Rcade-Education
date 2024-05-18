<?php

namespace App\Http\Requests\Admin\Content\Course;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
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
            'master_id' => ['required', 'exists:users,id'],
            'name' => ['required'],
            'category_id' => ['required','exists:course_categories,id'],
            'summary' => ['required' , 'max:150'],
            'description' => ['required'],
            'image' => ['required', 'mimes:png,jpg,jpeg,gif,webp'],
            'price' => ['required'],
            'slug' => ['required', 'unique:courses,slug'],
            'course_level' => ['required', 'in:0,1,2,3'],
            'course_status' => ['required', 'in:0,1,2,3'],
            'status' => ['required', 'in:0,1'],
            'tags' => ['required'],
        ];
    }
}
