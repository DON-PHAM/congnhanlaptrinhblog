<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
        $postId = $this->route('post');
        $uniqueRule = $postId ? "unique:posts,slug,{$postId}" : 'unique:posts,slug';
        
        return [
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'image' => 'nullable|image|max:3072',
            'slug' => "required|string|max:255|{$uniqueRule}",
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|string',
            'is_featured' => 'nullable|boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:255',
            'og_title' => 'nullable|string|max:255',
            'og_description' => 'nullable|string|max:500',
            'og_image' => 'nullable|string|max:255',
            'twitter_title' => 'nullable|string|max:255',
            'twitter_description' => 'nullable|string|max:500',
            'twitter_image' => 'nullable|string|max:255',
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Tiêu đề bài viết là bắt buộc.',
            'title.max' => 'Tiêu đề bài viết không được vượt quá 255 ký tự.',
            'slug.required' => 'Slug bài viết là bắt buộc.',
            'slug.unique' => 'Slug bài viết đã tồn tại.',
            'content.required' => 'Nội dung bài viết là bắt buộc.',
            'category_id.required' => 'Danh mục bài viết là bắt buộc.',
            'category_id.exists' => 'Danh mục không tồn tại.',
            'image.image' => 'File phải là hình ảnh.',
            'image.max' => 'Kích thước hình ảnh không được vượt quá 3MB.',
        ];
    }
} 