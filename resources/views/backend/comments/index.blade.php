@extends('layouts.master')
@section('contents')
<div class="container mt-4">
    <div class="card card-admin">
        <div class="card-header">
            <h2 class="card-title">Quản lý bình luận</h2>
            <a href="{{ route('comments.create') }}" class="btn btn-success">
                <i class="bi bi-plus-circle me-1"></i> Thêm bình luận
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

            <table class="table table-bordered datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Bài viết</th>
                        <th>Người bình luận</th>
                        <th>Nội dung</th>
                        <th>Loại</th>
                        <th>Thời gian</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($comments as $comment)
                        <tr>
                            <td>{{ $comment->id }}</td>
                            <td>
                                <a href="{{ route('posts.show', $comment->post_id) }}" target="_blank">
                                    {{ Str::limit($comment->post->title ?? 'N/A', 30) }}
                                </a>
                            </td>
                            <td>{{ $comment->user->name ?? 'N/A' }}</td>
                            <td>{{ Str::limit($comment->content, 50) }}</td>
                            <td>
                                @if($comment->parent)
                                    <span class="badge bg-info">Phản hồi</span>
                                @else
                                    <span class="badge bg-primary">Bình luận</span>
                                @endif
                            </td>
                            <td>{{ $comment->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('comments.show', $comment) }}" class="btn btn-icon btn-view" data-bs-toggle="tooltip" title="Xem chi tiết">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('comments.edit', $comment) }}" class="btn btn-icon btn-edit" data-bs-toggle="tooltip" title="Chỉnh sửa">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('comments.destroy', $comment) }}" method="POST" style="display:inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-icon btn-delete" data-bs-toggle="tooltip" title="Xóa">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="text-center">Chưa có bình luận nào</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('backend.modules.datatables_scripts')
@endsection 