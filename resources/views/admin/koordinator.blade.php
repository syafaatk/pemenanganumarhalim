@extends('admin.layout')

@section('title','Koordinator')

@section('content')

  <div id="layoutSidenav_content"><div class="container-fluid">
    <h1 class="mt-4">Koordinator</h1>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <a class="btn btn-primary" href="{{ route('admin.koordinator/create') }}">
                    Tambah Koordinator
                </a>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Koordinator</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTablekoordinator" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Keterangan</th>
                            <th>No HP</th>
                            <th>Total</th>
                            @if(Auth::user()->super_admin == "1")
                            <th style="width:100px; text-align:center;">Edit</th>
                            <th style="width:100px; text-align:center;">Delete</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($koordinators as $koordinator)
                          <tr>
                              <td>{{ $koordinator->name }}</td>
                              
                                @if ($koordinator->keterangan == 1)
                                    <td>USTADZ</td>
                                @elseif($koordinator->keterangan == 2)
                                    <td>KKP</td>
                                @elseif($koordinator->keterangan == 3)
                                    <td>PARTAI</td>
                                @elseif($koordinator->keterangan == 4)
                                    <td>KELUARGA</td>
                                @else
                                    <td>-</td>
                                @endif
                              <td>{{ $koordinator->nohp }}</td>
                              <td>
                              @foreach($viewer as $view)
                                @if ($view->id == $koordinator->id)
                                    {{ $view->total }}
                                @endif
                              @endforeach
                              </td>
                              @if(Auth::user()->super_admin == "1")
                              <td class="md-0"><a href="{{ route('admin.koordinator/edit',['id' => $koordinator->id]) }}"><i class="fas fa-pencil-alt"></i></a></td>
                              <td class=""><a href="{{ route('admin.koordinator/delete',['id' => $koordinator->id]) }}"><i class="far fa-trash-alt"></i></a> </td>
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
