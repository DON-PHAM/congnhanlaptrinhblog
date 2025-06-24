# CongNhanLapTrinh Blog - Laravel Admin System

![Laravel Logo](https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg)

## Giới thiệu

Đây là hệ thống quản trị blog cá nhân được xây dựng bằng Laravel, giao diện quản trị hiện đại, hỗ trợ đầy đủ các module cần thiết cho một blog chuyên nghiệp.

## Tính năng chính

- **Authentication & Authorization**: Đăng nhập, phân quyền admin/user, bảo vệ route, cột role cho users.
- **Quản lý bài viết**: CRUD, soft delete, featured, views, upload ảnh, excerpt, SEO (meta, og, twitter, JSON-LD), gắn nhiều tag, chọn danh mục, chọn trạng thái.
- **Quản lý danh mục**: CRUD, chọn icon SVG, hiển thị icon, phân cấp danh mục.
- **Quản lý bình luận**: CRUD bình luận bài viết.
- **Quản lý người dùng**: CRUD, phân quyền, supperadmin.
- **Quản lý cài đặt**: CRUD cấu hình website.
- **Quản lý About/CV**: CRUD thông tin cá nhân, avatar, nghề nghiệp, kỹ năng, kinh nghiệm, học vấn, mạng xã hội, chỉ 1 bản ghi.
- **Quản lý Tag**: CRUD, tự động tạo slug, gắn nhiều tag cho bài viết.
- **Sidebar hiện đại**: Liên kết nhanh đến các module.
- **API**: Route API cho CRUD, bảo vệ bằng sanctum, middleware admin cho API.
- **Giao diện**: Backend (AdminLTE), frontend cơ bản, form nhập liệu rõ ràng, responsive.
- **Thông báo**: Toast thành công, modal xác nhận xóa đẹp.

## Yêu cầu hệ thống
- PHP >= 8.1
- Composer
- MySQL/MariaDB
- Node.js (nếu muốn build lại frontend assets)

## Cài đặt

```bash
# Clone project
$ git clone https://github.com/DON-PHAM/congnhanlaptrinhblog.git
$ cd congnhanlaptrinhblog

# Cài đặt composer
$ composer install

# Cài đặt npm (nếu cần)
$ npm install && npm run build

# Tạo file .env và cấu hình database
$ cp .env.example .env
$ php artisan key:generate

# Chạy migrate và seed dữ liệu mẫu
$ php artisan migrate --seed

# Phân quyền thư mục storage, bootstrap/cache nếu cần
```

## Chạy local

```bash
php artisan serve
```
Truy cập: http://localhost:8000

## Đăng nhập quản trị
- Đăng nhập bằng tài khoản admin được tạo khi seed hoặc tự đăng ký, sau đó gán quyền admin trong database.

## Đóng góp & License
- Pull request, issue, góp ý đều được chào đón!
- MIT License.

---

> Dự án phát triển bởi [congnhanlaptrinh.info.vn](https://congnhanlaptrinh.info.vn)
