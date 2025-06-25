<?php

namespace App\Traits;

trait MessageTrait
{
    /**
     * Get success message for create action
     */
    protected function getCreateSuccessMessage($resource)
    {
        $messages = [
            'posts' => 'Tạo bài viết thành công!',
            'categories' => 'Tạo danh mục thành công!',
            'comments' => 'Tạo bình luận thành công!',
            'settings' => 'Tạo cấu hình thành công!',
            'users' => 'Tạo tài khoản thành công!',
            'abouts' => 'Tạo thông tin cá nhân thành công!',
            'tags' => 'Tạo thẻ thành công!',
        ];
        
        return $messages[$resource] ?? 'Tạo thành công!';
    }

    /**
     * Get success message for update action
     */
    protected function getUpdateSuccessMessage($resource)
    {
        $messages = [
            'posts' => 'Cập nhật bài viết thành công!',
            'categories' => 'Cập nhật danh mục thành công!',
            'comments' => 'Cập nhật bình luận thành công!',
            'settings' => 'Cập nhật cấu hình thành công!',
            'users' => 'Cập nhật tài khoản thành công!',
            'abouts' => 'Cập nhật thông tin cá nhân thành công!',
            'tags' => 'Cập nhật thẻ thành công!',
        ];
        
        return $messages[$resource] ?? 'Cập nhật thành công!';
    }

    /**
     * Get success message for delete action
     */
    protected function getDeleteSuccessMessage($resource)
    {
        $messages = [
            'posts' => 'Xóa bài viết thành công!',
            'categories' => 'Xóa danh mục thành công!',
            'comments' => 'Xóa bình luận thành công!',
            'settings' => 'Xóa cấu hình thành công!',
            'users' => 'Xóa tài khoản thành công!',
            'abouts' => 'Xóa thông tin cá nhân thành công!',
            'tags' => 'Xóa thẻ thành công!',
        ];
        
        return $messages[$resource] ?? 'Xóa thành công!';
    }
} 