@extends('layouts.master')
@section('contents')
<div class="container mt-4">
    <h2>Chi tiết người dùng</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $user->name }}</h5>
            <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
            <p class="card-text"><strong>Quyền:</strong> @if($user->isSupperAdmin()) <span class="badge bg-danger">Supper Admin</span> @else <span class="badge bg-secondary">{{ $user->role }}</span> @endif</p>
            <a href="{{ route('users.edit', $user) }}" class="btn btn-primary">Sửa</a>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Quay lại</a>
        </div>
    </div>
</div>
@endsection 