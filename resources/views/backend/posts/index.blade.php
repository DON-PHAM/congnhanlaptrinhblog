@extends('layouts.master')
@section('contents')
<div class="container mt-4">
    <div class="card card-admin">
        <div class="card-header">
            <h2 class="card-title">Danh sách bài viết</h2>
            <a href="{{ route('posts.create') }}" class="btn btn-success">
                <i class="bi bi-plus-circle me-1"></i> Thêm bài viết
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
                        <th>ID</th>
                        <th>Tiêu đề</th>
                        <th>Slug</th>
                        <th>Danh mục</th>
                        <th>Tác giả</th>
                        <th>Nổi bật</th>
                        <th>Lượt xem</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->slug }}</td>
                            <td>{{ optional($post->category)->name }}</td>
                            <td>{{ optional($post->user)->name }}</td>
                            <td>{!! $post->is_featured ? '<span class="badge badge-status badge-featured">Nổi bật</span>' : '' !!}</td>
                            <td>{{ $post->views }}</td>
                            <td>
                                @if($post->status == 'published')
                                    <span class="badge bg-success">Đã xuất bản</span>
                                @elseif($post->status == 'draft')
                                    <span class="badge bg-secondary">Bản nháp</span>
                                @else
                                    <span class="badge bg-warning">{{ $post->status }}</span>
                                @endif
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('posts.show', $post) }}" class="btn btn-icon btn-view" data-bs-toggle="tooltip" title="Xem chi tiết">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-icon btn-edit" data-bs-toggle="tooltip" title="Chỉnh sửa">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-icon btn-delete" data-bs-toggle="tooltip" title="Xóa">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
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