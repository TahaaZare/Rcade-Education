<?php

namespace App\Http\Requests\Admin\Content\Course\Episode;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEpisodeAdminRequest extends FormRequest
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
            'file_path' => 'sometimes|mimes:mp4,mov,ogg,qt,pdf|max:10485760',//10 min || 20 min
            'name' =>'required|max:250',
            'description' =>'required',
            'status' => 'required|numeric|in:0,1,2',
        ];
    }
}
