@extends('layouts.master')
@section('contents')
<div class="container mt-4">
    <h2>Danh sách thẻ (Tag)</h2>
    <a href="{{ route('tags.create') }}" class="btn btn-primary mb-3">Thêm thẻ mới</a>
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
    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Tên thẻ</th>
                <th>Slug</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tags as $tag)
                <tr>
                    <td>{{ $tag->id }}</td>
                    <td>{{ $tag->name }}</td>
                    <td>{{ $tag->slug }}</td>
                    <td>
                        <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                        <form action="{{ route('tags.destroy', $tag->id) }}" method="POST" class="d-inline delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-sm btn-delete" data-id="{{ $tag->id }}">Xóa</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center">Chưa có thẻ nào</td></tr>
            @endforelse
        </tbody>
    </table>
    <div>{{ $tags->links() }}</div>
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
        Bạn có chắc chắn muốn xóa thẻ này không?
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