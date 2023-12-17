@extends('admin.layout')

@section('title','Trashed')

@section('content')

  <div id="layoutSidenav_content"><div class="container-fluid">
    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Trashed Matapilihs</div>
        <div class="card-body">
            <div class="table-responsive">
                <button type="button" class="btn btn-danger" id="deleteSelected">Delete Selected</button>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>
                                <input type="checkbox" id="checkAll">
                            </th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Kecamatan</th>
                            <th>Kelurahan</th>
                            <th>TPS</th>
                            <th>Restore</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($matapilihs as $matapilih)
                          <tr>
                            <td>
                                <input type="checkbox" class="row-select" data-id="{{ $matapilih->id }}">
                            </td>
                            <td>{{ $matapilih->nik }}</td>
                            <td>{{ $matapilih->nama }}</td>
                            <td>{{ $matapilih->alamat }}</td>
                            <td>{{ $matapilih->kecamatan }}</td>
                            <td>{{ $matapilih->kelurahan }}</td>
                            <td>{{ $matapilih->tps }}</td>
                            <td class=""><a class="btn btn-success" href="{{ route('admin.matapilih/restore',['id' => $matapilih->id]) }}">Restore</a> </td>
                            <td class=""><a class="btn btn-danger" href="{{ route('admin.matapilih/forcedelete',['id' => $matapilih->id]) }}">Delete</a> </td>
                          </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card mb-4">
            </div>
        </div>
    </div> --}}

</div>
</main>
<!-- Modal for Confirmation -->
<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete the selected rows?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
    $('#checkAll').change(function () {
        $('.row-select').prop('checked', this.checked);
    });

    $('.row-select').change(function () {
        if ($('.row-select:checked').length == $('.row-select').length) {
            $('#checkAll').prop('checked', true);
        } else {
            $('#checkAll').prop('checked', false);
        }
    });

    $('#deleteSelected').click(function () {
        // Open the confirmation modal
        $('#deleteConfirmationModal').modal('show');
    });

    $('#confirmDelete').click(function () {
        var selectedIds = [];

        $('.row-select:checked').each(function () {
            selectedIds.push($(this).data('id'));
        });

        if (selectedIds.length > 0) {
            var csrfToken = '{{ csrf_token() }}';

            $.ajax({
                url: '{{ route("admin.matapilih/multipleDelete") }}',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                data: { selectedIds: selectedIds },
                success: function (response) {
                    if (response.success) {
                        alert(response.message);
                        // Reload the page or update the table as needed
                        location.reload();
                    } else {
                        alert(response.message);
                    }
                },
                error: function (xhr, status, error) {
                    console.error('AJAX Error: ', error);
                }
            });
        } else {
            alert('Please select at least one row to delete.');
        }

        // Close the confirmation modal
        $('#deleteConfirmationModal').modal('hide');
    });
});
  </script>
@endsection
