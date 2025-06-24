@extends('layouts.master')
@section('contents')
<div class="container mt-4">
    <h2>Danh sách bài viết</h2>
    <a href="{{ route('posts.create') }}" class="btn btn-success mb-3">Thêm bài viết</a>
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
    <table class="table table-bordered">
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
                    <td>{!! $post->is_featured ? '<span class="badge bg-success">Nổi bật</span>' : '' !!}</td>
                    <td>{{ $post->views }}</td>
                    <td>{{ $post->status }}</td>
                    <td>
                        <a href="{{ route('posts.show', $post) }}" class="btn btn-info btn-sm">Xem</a>
                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary btn-sm">Sửa</a>
                        <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline-block" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-sm btn-delete" data-id="{{ $post->id }}">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $posts->links() }}
</div>
<!-- Modal xác nhận xóa -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Xác nhận xóa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Bạn có chắc chắn muốn xóa bài viết này không?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
        <button type="button" class="btn btn-danger" id="confirmDelete">Xóa</button>
      </div>
    </div>
  </div>
</div>
@push('scripts')
<script>
    let deleteForm;
    document.querySelectorAll('.btn-delete').forEach(btn => {
        btn.addEventListener('click', function(e) {
            deleteForm = this.closest('form');
            var modal = new bootstrap.Modal(document.getElementById('deleteModal'));
            modal.show();
        });
    });
    document.getElementById('confirmDelete').addEventListener('click', function() {
        if(deleteForm) deleteForm.submit();
    });
</script>
@endpush
@endsection 