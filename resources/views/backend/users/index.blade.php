@extends('layouts.master')
@section('contents')
<div class="container mt-4">
    <div class="card card-admin">
        <div class="card-header">
            <h2 class="card-title">Danh sách người dùng</h2>
            <a href="{{ route('users.create') }}" class="btn btn-success">
                <i class="bi bi-plus-circle me-1"></i> Thêm người dùng
            </a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 9999;">
                    <div id="successToast" class="toast align-items-center text-bg-success border-0 show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="3000">
                        <div class="d-flex">
                            <div class="toast-body">
                                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                            </div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
                <script>
                    setTimeout(function() {
                        var toastEl = document.getElementById('successToast');
                        if (toastEl) {
                            var toast = bootstrap.Toast.getOrCreateInstance(toastEl);
                            toast.hide();
                        }
                    }, 3000);
                </script>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <table class="table table-bordered datatable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Quyền</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if($user->isSupperAdmin())
                                    <span class="badge bg-danger">Supper Admin</span>
                                @else
                                    <span class="badge bg-secondary">{{ $user->role }}</span>
                                @endif
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('users.show', $user) }}" class="btn btn-icon btn-view" data-bs-toggle="tooltip" title="Xem chi tiết">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('users.edit', $user) }}" class="btn btn-icon btn-edit" data-bs-toggle="tooltip" title="Chỉnh sửa">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    @if(!$user->isSupperAdmin())
                                    <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-icon btn-delete" data-bs-toggle="tooltip" title="Xóa">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('backend.modules.datatables_scripts')
@endsection 