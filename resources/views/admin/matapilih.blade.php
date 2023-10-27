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
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>NIK</th>
                            <th>RT</th>
                            <th>RW</th>
                            <th>TPS</th>
                            <th>Kecamatan</th>
                            <th>Kelurahan</th>
                            <th>No HP</th>
                            <th>Koordinator</th>
                            <th>Edit</th>
                            <th>Trashed</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($matapilihs as $matapilih)
                            <tr>
                                {{-- <td>{{ $loop->iteration }}</td> --}}
                                <td>{{ $matapilih->nama }}</td>
                                <td>{{ $matapilih->alamat }}</td>
                                <td>{{ $matapilih->nik }}</td>
                                <td>{{ $matapilih->rt }}</td>
                                <td>{{ $matapilih->rw }}</td>
                                <td>{{ $matapilih->tps }}</td>
                                <td>{{ $matapilih->kecamatan }}</td>
                                <td>{{ $matapilih->kelurahan }}</td>
                                <td>{{ $matapilih->nohp }}</td>
                                <td>{{ $matapilih->koordinator }}</td>
                                <td class=""><a href="{{ route('admin.matapilih/edit',['id' => $matapilih->id]) }}"><i class="fas fa-pencil-alt"></i></a></td>
                                <td class=""><a href="{{ route('admin.matapilih/trash',['id' => $matapilih->id]) }}"><i class="far fa-trash-alt"></i></a></td>
                                <td class=""><a class="btn btn-danger" href="{{ route('admin.matapilih/forcedelete',['id' => $matapilih->id]) }}">Delete</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
</main>

@endsection
