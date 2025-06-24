@extends('layouts.master')
@section('contents')
<div class="container mt-4">
    <h2>Chỉnh sửa người dùng</h2>
    <form action="{{ route('users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Tên</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
            @error('name')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
            @error('email')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu mới (bỏ qua nếu không đổi)</label>
            <input type="password" name="password" id="password" class="form-control">
            @error('password')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Xác nhận mật khẩu mới</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Quyền</label>
            <select name="role" id="role" class="form-control" required @if($user->isSupperAdmin()) disabled @endif>
                <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User</option>
                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="supperadmin" {{ old('role', $user->role) == 'supperadmin' ? 'selected' : '' }}>Supper Admin</option>
            </select>
            @if($user->isSupperAdmin())
                <input type="hidden" name="role" value="supperadmin">
            @endif
            @error('role')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection 