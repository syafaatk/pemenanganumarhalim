@extends('admin.layout')

@section('title','Trashed')

@section('content')

  <div id="layoutSidenav_content"><div class="container-fluid">
    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Trashed Matapilihs</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
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

@endsection
