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
                <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
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
                            @if(Auth::user()->super_admin == "1")
                            <th>Edit</th>
                            <th>Delete</th>
                            @endif
                            {{-- <th>Delete</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataChunks as $dataChunk)
                            @foreach ($dataChunk as $record)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $record->nama }}</td>
                                <td>{{ $record->nik }}</td>
                                <td>{{ $record->rt }}</td>
                                <td>{{ $record->rw }}</td>
                                <td>{{ $record->tps }}</td>
                                <td>{{ $record->kabupaten }}</td>
                                <td>{{ $record->kecamatan }}</td>
                                <td>{{ $record->kelurahan }}</td>
                                <td>{{ $record->nohp }}</td>
                                <td>{{ $record->koordinator->name }}</td>
                                <td>{{ $record->user->name }}</td>
                                @if(Auth::user()->super_admin == "1")
                                <td class=""><a href="{{ route('admin.matapilih/edit',['id' => $record->id]) }}"><i class="fas fa-pencil-alt"></i></a></td>
                                <td class=""><a href="{{ route('admin.matapilih/trash',['id' => $record->id]) }}"><i class="far fa-trash-alt"></i></a></td>
                                {{-- <td class=""><a class="btn btn-danger" href="{{ route('admin.matapilih/forcedelete',['id' => $matapilih->id]) }}">Delete</a></td> --}}
                                @endif
                            </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
</main>
<script>
$(document).ready(function() {
    $('#myTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'print',
            {
                extend: 'pdfHtml5',
                exportOptions: {
                columns: [ 0, 1, 3 , 4, 5, 6, 7 ,8, 9 ]
                },
                orientation: 'landscape',
                pageSize: 'LEGAL'}
        ],
        columnDefs: [
            {
                target: 0,
                searchable: false,
                sortable : false
            }
        ],
    });
});
</script>

@endsection
