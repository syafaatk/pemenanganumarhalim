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
    <div class="row">
        @foreach($viewer2 as $view2)
        <div class="col-xl-1 col-md-2">
          <div class="card bg-danger text-white mb-4">
              <a href="">
                @if($view2->keterangan == 4)
                    <div class="card-body text-white">KELUARGA</div>
                @elseif($view2->keterangan == 3)
                    <div class="card-body text-white">PARTAI</div>
                @elseif($view2->keterangan == 2)
                    <div class="card-body text-white">KKP</div>
                @elseif($view2->keterangan == 1)
                    <div class="card-body text-white">USTADZ</div>
                @else
                    <div class="card-body text-white">TANPA KET</div>
                @endif
              </a>
              <div class="card-header">{{ $view2->total }}</div>
          </div>
        </div>
        @endforeach
      </div>
    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Koordinator</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTablekoordinator" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Keterangan</th>
                            <th>No HP</th>
                            <th>Total</th>
                            <th>Whatsapp</th>
                            @if(Auth::user()->super_admin == "1")
                            <th style="width:100px; text-align:center;">Edit</th>
                            <th style="width:100px; text-align:center;">Delete</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($koordinators as $koordinator)
                          <tr>
                               <td>{{ $loop->iteration }}</td>
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
                              <td>
                              @foreach($viewer as $view)
                                @if ($view->id == $koordinator->id)
                                <a class="btn btn-success" href="https://api.whatsapp.com/send?phone={{ $koordinator->nohp }}&text=Halo%20{{ $koordinator->name }}%2C%20Total%20matapilih%20anda%20{{ $view->total }}">WA</a>
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
