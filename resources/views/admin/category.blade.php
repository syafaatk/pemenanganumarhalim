@extends('admin.layout')

@section('title','Categories')

@section('content')

  <div id="layoutSidenav_content"><div class="container-fluid">
    <h1 class="mt-4">Kecamatan</h1>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <a class="btn btn-primary" href="{{ route('admin.category/create') }}">
                    Tambah Kecamatan
                </a>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Kecamatan</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTablekecamatan" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Kota</th>
                            <th>Kecamatan</th>
                            <th>Total</th>
                            @if(Auth::user()->super_admin == "1")
                            <th style="width:100px; text-align:center;">Edit</th>
                            <th style="width:100px; text-align:center;">Delete</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                          <tr>
                              <td>{{ $category->kabkota }}</td>
                              <td>{{ $category->name }}</td>
                              @foreach($viewer as $view)
                                @if ($view->id == $category->id)
                                    <td>{{ $view->total }}</td>
                                @endif
                              @endforeach
                              @if(Auth::user()->super_admin == "1")
                              <td class="md-0"><a href="{{ route('admin.category/edit',['id' => $category->id]) }}"><i class="fas fa-pencil-alt"></i></a></td>
                              <td class=""><a href="{{ route('admin.category/delete',['id' => $category->id]) }}"><i class="far fa-trash-alt"></i></a> </td>
                              @endif
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
