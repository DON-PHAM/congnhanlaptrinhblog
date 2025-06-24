@extends('layouts.master')
@section('contents')
<div class="container mt-4">
    <h2>Chỉnh sửa cấu hình</h2>
    <form action="{{ route('settings.update', $setting) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="key" class="form-label">Key</label>
            <input type="text" name="key" id="key" class="form-control" value="{{ old('key', $setting->key) }}" required>
            @error('key')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="value" class="form-label">Value</label>
            <textarea name="value" id="value" class="form-control" rows="4">{{ old('value', $setting->value) }}</textarea>
            @error('value')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('settings.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
 