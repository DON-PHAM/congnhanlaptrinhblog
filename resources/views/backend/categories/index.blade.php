@extends('layouts.master')
@section('contents')
<div class="container mt-4">
    <h2>Danh sách danh mục</h2>
    <a href="{{ route('categories.create') }}" class="btn btn-success mb-3">Thêm danh mục</a>
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
                <th>Icon</th>
                <th>Tên</th>
                <th>Slug</th>
                <th>Mô tả</th>
                <th>Danh mục cha</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>
                        {{-- Hiển thị icon SVG --}}
                        @php
                            $svg = \App\Constants\CategoryIcons::ICONS[$category->icon] ?? '';
                        @endphp
                        {!! $svg !!}
                    </td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>{{ $category->description }}</td>
                    <td>{{ optional($category->parent)->name }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-primary btn-sm">Sửa</a>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline-block" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-sm btn-delete" data-id="{{ $category->id }}">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $categories->links() }}
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
        Bạn có chắc chắn muốn xóa danh mục này không?
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