<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
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
        return [
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'avatar' => 'nullable|image|max:2048',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:255',
            'birthday' => 'nullable|date',
            'summary' => 'nullable|string',
            'skills' => 'nullable|string',
            'experience' => 'nullable|string',
            'education' => 'nullable|string',
            'social_links' => 'nullable|array',
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Tên là bắt buộc.',
            'name.max' => 'Tên không được vượt quá 255 ký tự.',
            'title.max' => 'Chức danh không được vượt quá 255 ký tự.',
            'avatar.image' => 'File phải là hình ảnh.',
            'avatar.max' => 'Kích thước hình ảnh không được vượt quá 2MB.',
            'email.email' => 'Email không đúng định dạng.',
            'email.max' => 'Email không được vượt quá 255 ký tự.',
            'phone.max' => 'Số điện thoại không được vượt quá 50 ký tự.',
            'address.max' => 'Địa chỉ không được vượt quá 255 ký tự.',
            'birthday.date' => 'Ngày sinh không đúng định dạng.',
        ];
    }
} 