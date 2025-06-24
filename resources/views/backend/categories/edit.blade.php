@extends('layouts.master')
@section('contents')
<div class="container mt-4">
    <h2>Chỉnh sửa danh mục</h2>
    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Tên danh mục</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $category->name) }}" required>
            @error('name')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <input type="hidden" name="slug" id="slug" value="{{ old('slug', $category->slug) }}">
        <div class="mb-3">
            <label for="description" class="form-label">Mô tả</label>
            <textarea name="description" id="description" class="form-control">{{ old('description', $category->description) }}</textarea>
            @error('description')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="icon" class="form-label">Icon</label>
            <select name="icon" id="icon" class="form-control">
                <option value="">-- Chọn icon --</option>
                @foreach(\App\Constants\CategoryIcons::all() as $key => $svg)
                    <option value="{{ $key }}" {{ old('icon', $category->icon) == $key ? 'selected' : '' }}>{{ ucfirst($key) }}</option>
                @endforeach
            </select>
            @error('icon')<div class="text-danger">{{ $message }}</div>@enderror
            <div id="icon-preview" class="mt-2"></div>
        </div>
        <div class="mb-3">
            <label for="parent_id" class="form-label">Danh mục cha</label>
            <select name="parent_id" id="parent_id" class="form-control">
                <option value="">-- Không chọn --</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ old('parent_id', $category->parent_id) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                @endforeach
            </select>
            @error('parent_id')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
@push('scripts')
<script>
    // Hàm chuyển đổi tên thành slug
    function convertToSlug(text) {
        return text
            .toLowerCase()
            .normalize('NFD')
            .replace(/[\u0300-\u036f]/g, '')
            .replace(/[đĐ]/g, 'd')
            .replace(/[^a-z0-9\s-]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-')
            .trim();
    }

    // Tự động tạo slug khi nhập tên
    document.getElementById('name').addEventListener('input', function() {
        const nameValue = this.value;
        const slugValue = convertToSlug(nameValue);
        document.getElementById('slug').value = slugValue;
    });

    // Hiển thị icon mẫu khi chọn
    const icons = @json(\App\Constants\CategoryIcons::all());
    const iconSelect = document.getElementById('icon');
    const iconPreview = document.getElementById('icon-preview');
    function updateIconPreview() {
        const key = iconSelect.value;
        iconPreview.innerHTML = icons[key] || '';
    }
    iconSelect.addEventListener('change', updateIconPreview);
    window.addEventListener('DOMContentLoaded', updateIconPreview);
</script>
@endpush 