@extends('admin.layout')

@section('title','Dashboard')

@section('content')

  <div id="layoutSidenav_content"><div class="container-fluid">
    <h1 class="mt-4">Mata Pilih</h1>
    <div class="row">
      <div class="col-xl-3 col-md-6">
      <div class="card bg-primary text-white mb-4">
        <a href="{{ route('admin.dashboard') }}">
          <div class="card-body text-white">Posts</div>
        </a>
        <div class="card-header">{{ $matapilihs->count() }}</div>
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
                            <th>id</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>NIK</th>
                            <th>RT</th>
                            <th>RW</th>
                            <th>TPS</th>
                            <th>JK</th>
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
                        @foreach($matapilihs as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->nama }}</td>
                                <td>{{ $post->alamat }}</td>
                                <td>{{ $post->nik }}</td>
                                <td>{{ $post->rt }}</td>
                                <td>{{ $post->rw }}</td>
                                <td>{{ $post->tps }}</td>
                                <td>{{ $post->jenis_kelain }}</td>
                                <td>{{ $post->kecamatan }}</td>
                                <td>{{ $post->kelurahan }}</td>
                                <td>{{ $post->nohp }}</td>
                                <td>
                                    @foreach($tags as $tag)
                                      @foreach($post->tags as $t)
                                        @if($tag->id == $t->id)
                                          <p class="card bg-success text-white mb-4"
                                          style="display:inline-block; padding:1px; margin: 1px;">
                                          {{ $tag->tag }}</p>
                                        @endif
                                      @endforeach
                                    @endforeach
                                </td>
                                <td class=""><a href="{{ route('admin.post/edit',['id' => $post->id]) }}"><i class="fas fa-pencil-alt"></i></a></td>
                                <td class=""><a href="{{ route('admin.post/trash',['id' => $post->id]) }}"><i class="far fa-trash-alt"></i></a></td>
                                <td class=""><a class="btn btn-danger" href="{{ route('admin.post/forcedelete',['id' => $post->id]) }}">Delete</a></td>
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
