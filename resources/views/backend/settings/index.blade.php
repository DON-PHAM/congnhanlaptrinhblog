@extends('layouts.master')
@section('contents')
<div class="container mt-4">
    <h2>Danh sách cấu hình website</h2>
    <a href="{{ route('settings.create') }}" class="btn btn-success mb-3">Thêm cấu hình</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Key</th>
                <th>Value</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($settings as $setting)
                <tr>
                    <td>{{ $setting->id }}</td>
                    <td>{{ $setting->key }}</td>
                    <td>{{ Str::limit($setting->value, 50) }}</td>
                    <td>
                        <a href="{{ route('settings.show', $setting) }}" class="btn btn-info btn-sm">Xem</a>
                        <a href="{{ route('settings.edit', $setting) }}" class="btn btn-primary btn-sm">Sửa</a>
                        <form action="{{ route('settings.destroy', $setting) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $settings->links() }}
</div>
@endsection 