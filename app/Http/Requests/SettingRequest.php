<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
        $settingId = $this->route('setting');
        $uniqueRule = $settingId ? "unique:settings,key,{$settingId}" : 'unique:settings,key';
        
        return [
            'key' => "required|string|max:255|{$uniqueRule}",
            'value' => 'nullable|string',
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'key.required' => 'Khóa cấu hình là bắt buộc.',
            'key.max' => 'Khóa cấu hình không được vượt quá 255 ký tự.',
            'key.unique' => 'Khóa cấu hình đã tồn tại.',
        ];
    }
} 