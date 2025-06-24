@extends('layouts.master')
@section('contents')
<div class="container mt-4">
    <h2>Chi tiết cấu hình</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $setting->key }}</h5>
            <p class="card-text"><strong>Value:</strong><br> {!! nl2br(e($setting->value)) !!}</p>
            <a href="{{ route('settings.edit', $setting) }}" class="btn btn-primary">Sửa</a>
            <a href="{{ route('settings.index') }}" class="btn btn-secondary">Quay lại</a>
        </div>
    </div>
</div>
@endsection 