@push('styles')
<link rel="stylesheet" href="{{ asset('backend/css/custom-admin.css') }}"/>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css"/>
@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        // Khởi tạo DataTable với các tùy chọn nâng cao
        $('.datatable').DataTable({
            responsive: true,
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/vi.json'
            },
            dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                 "<'row'<'col-sm-12'tr>>" +
                 "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            // Tắt sắp xếp mặc định cho cột hành động (thường là cột cuối)
            "columnDefs": [
                { "orderable": false, "targets": -1 }
            ]
        });

        // Xử lý nút xóa với modal xác nhận
        let deleteForm;
        $(document).on('click', '.btn-delete', function() {
            deleteForm = $(this).closest('form');
            var modal = new bootstrap.Modal(document.getElementById('deleteModal'));
            modal.show();
        });
        
        $('#confirmDelete').on('click', function() {
            if(deleteForm) deleteForm.submit();
        });

        // Hiệu ứng cho các nút hành động
        $(document).on('mouseenter', '.btn-icon', function() {
            $(this).tooltip('show');
        });
    });
</script>
@endpush

<!-- Modal xác nhận xóa dùng chung -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Xác nhận xóa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Bạn có chắc chắn muốn xóa mục này không?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
        <button type="button" class="btn btn-danger" id="confirmDelete">Xóa</button>
      </div>
    </div>
  </div>
</div> 