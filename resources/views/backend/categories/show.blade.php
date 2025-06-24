@extends('layouts.master')
@section('contents')
<div class="container mt-4">
    <h2>Chi tiết danh mục</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $category->name }}</h5>
            <p class="card-text"><strong>Slug:</strong> {{ $category->slug }}</p>
            <p class="card-text"><strong>Mô tả:</strong> {{ $category->description }}</p>
            <p class="card-text"><strong>Danh mục cha:</strong> {{ optional($category->parent)->name }}</p>
            <a href="{{ route('categories.edit', $category) }}" class="btn btn-primary">Sửa</a>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Quay lại</a>
        </div>
    </div>
</div>
@endsection 