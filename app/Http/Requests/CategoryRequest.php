<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        $categoryId = $this->route('category');
        $uniqueRule = $categoryId ? "unique:categories,slug,{$categoryId}" : 'unique:categories,slug';
        
        return [
            'name' => 'required|string|max:255',
            'slug' => "required|string|max:255|{$uniqueRule}",
            'description' => 'nullable|string',
            'parent_id' => 'nullable|exists:categories,id',
            'icon' => 'nullable|string|max:255',
            'display_order' => 'nullable|integer',
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Tên danh mục là bắt buộc.',
            'name.max' => 'Tên danh mục không được vượt quá 255 ký tự.',
            'slug.required' => 'Slug danh mục là bắt buộc.',
            'slug.unique' => 'Slug danh mục đã tồn tại.',
            'parent_id.exists' => 'Danh mục cha không tồn tại.',
            'display_order.integer' => 'Thứ tự hiển thị phải là số nguyên.',
        ];
    }
} 