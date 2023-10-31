@extends('admin.layout')

@section('title','Dashboard')

@section('content')

  <div id="layoutSidenav_content"><div class="container-fluid">
    <h1 class="mt-4">Mata Pilih</h1>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <a class="btn btn-primary" href="{{ route('admin.matapilih/create') }}">
                    Tambah Mata Pilih
                </a>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>All Posts</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered yajra-datatable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>RT</th>
                            <th>RW</th>
                            <th>TPS</th>
                            <th>Kabupaten</th>
                            <th>Kecamatan</th>
                            <th>Kelurahan</th>
                            <th>No HP</th>
                            <th>Koordinator</th>
                            <th>Admin</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
</main>
<script type="text/javascript">
    $(function () {
      var table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.matapilih.list') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nama', name: 'nama'},
            {data: 'nik', name: 'nik'},
            {data: 'rt', name: 'rt'},
            {data: 'rw', name: 'rw'},
            {data: 'tps', name: 'tps'},
            {data: 'kabupaten', name: 'kabupaten'},
            {data: 'kecamatan', name: 'kecamatan'},
            {data: 'kelurahan', name: 'kelurahan'},
            {data: 'nohp', name: 'nohp'},
            {data: 'nama_koordinator', name: 'nama_koordinator'},
            {data: 'nama_user', name: 'nama_user'},
            {
                data: 'id',
                'render': function (data, type, full, meta) {
                    return '<a class="btn btn-primary" data-action="edit" href="matapilih/edit/' + data + '"><i class="fas fa-pencil-alt"></i></a>';
                }
            },
            {
                data: 'id',
                'render': function (data, type, full, meta) {
                    return '<a class="btn btn-danger" data-action="delete" href="matapilih/delete/' + data + '"><i class="far fa-trash-alt"></i></an>';
                }
            },
        ],
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'print',
            {
                extend: 'pdfHtml5',
                exportOptions: {
                columns: [ 0, 1, 2]
                },
                orientation: 'landscape',
                pageSize: 'LEGAL'}
        ],
      });
    });
  </script>

@endsection
