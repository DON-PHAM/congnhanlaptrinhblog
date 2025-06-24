@extends('layouts.master')
@section('contents')
<div class="container mt-4">
    <h2>Thêm cấu hình mới</h2>
    <form action="{{ route('settings.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="key" class="form-label">Key</label>
            <input type="text" name="key" id="key" class="form-control" value="{{ old('key') }}" required>
            @error('key')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="value" class="form-label">Value</label>
            <textarea name="value" id="value" class="form-control" rows="4">{{ old('value') }}</textarea>
            @error('value')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
        <a href="{{ route('settings.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection 