<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
        $rules = [
            'content' => 'required|string',
        ];

        // Chỉ validate post_id và user_id khi tạo mới
        if ($this->isMethod('POST')) {
            $rules['post_id'] = 'required|exists:posts,id';
            $rules['user_id'] = 'required|exists:users,id';
            $rules['parent_id'] = 'nullable|exists:comments,id';
        }

        return $rules;
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'content.required' => 'Nội dung bình luận là bắt buộc.',
            'post_id.required' => 'Bài viết là bắt buộc.',
            'post_id.exists' => 'Bài viết không tồn tại.',
            'user_id.required' => 'Người dùng là bắt buộc.',
            'user_id.exists' => 'Người dùng không tồn tại.',
            'parent_id.exists' => 'Bình luận cha không tồn tại.',
        ];
    }
} 