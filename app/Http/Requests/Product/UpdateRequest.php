<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'id' => ['required'],
            'title' => ['required', 'string'],
            'description' => ['required'],
            'content' => ['required'],
            'preview_image' => ['nullable'],
            'price' => ['required'],
            'count' => ['required'],
            'is_published' => ['nullable'],
            'category_id' => ['required'],
            'group_id' => ['required'],
            'tags' => ['required'],
            'colors' => ['required'],
            'product_images' => ['nullable', 'array'],
        ];
    }
}
