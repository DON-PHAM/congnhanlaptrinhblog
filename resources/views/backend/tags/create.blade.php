@extends('layouts.master')
@section('contents')
<div class="container mt-4" style="max-width: 500px;">
    <h2>Thêm thẻ mới</h2>
    <form action="{{ route('tags.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Tên thẻ <span class="text-danger">*</span></label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            @error('name')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug <span class="text-danger">*</span></label>
            <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug') }}" required>
            @error('slug')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
        <a href="{{ route('tags.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
@push('scripts')
<script>
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
document.getElementById('name').addEventListener('input', function() {
    document.getElementById('slug').value = convertToSlug(this.value);
});
</script>
@endpush 