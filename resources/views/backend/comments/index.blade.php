@extends('layouts.master')
@section('contents')
<div class="container mt-4">
    <h2>Quản lý bình luận</h2>
    <a href="{{ route('comments.create') }}" class="btn btn-success mb-3">Thêm bình luận</a>
    
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

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Bài viết</th>
                            <th>Người bình luận</th>
                            <th>Nội dung</th>
                            <th>Bình luận cha</th>
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
                                        <span class="badge bg-info">Reply</span>
                                    @else
                                        <span class="badge bg-primary">Comment</span>
                                    @endif
                                </td>
                                <td>{{ $comment->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    <a href="{{ route('comments.show', $comment) }}" class="btn btn-info btn-sm">Xem</a>
                                    <a href="{{ route('comments.edit', $comment) }}" class="btn btn-warning btn-sm">Sửa</a>
                                    <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="d-inline delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm btn-delete" data-id="{{ $comment->id }}">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="7" class="text-center">Chưa có bình luận nào</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {{ $comments->links() }}
            </div>
        </div>
    </div>
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
        Bạn có chắc chắn muốn xóa bình luận này không?
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