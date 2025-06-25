<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
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
     */
    public function rules(): array
    {
        $tagId = $this->route('tag');
        $uniqueRule = $tagId ? "unique:tags,slug,{$tagId}" : 'unique:tags,slug';
        
        return [
            'name' => 'required|string|max:100',
            'slug' => "required|string|max:100|{$uniqueRule}",
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Tên thẻ là bắt buộc.',
            'name.max' => 'Tên thẻ không được vượt quá 100 ký tự.',
            'slug.required' => 'Slug thẻ là bắt buộc.',
            'slug.unique' => 'Slug thẻ đã tồn tại.',
            'slug.max' => 'Slug thẻ không được vượt quá 100 ký tự.',
        ];
    }
} 