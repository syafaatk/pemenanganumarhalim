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
                    <div class="card-body text-white">SIMPATISAN</div>
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
                            <th>Print</th>
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
                                    <td>SIMPATISAN</td>
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
                              
                              @foreach($viewer as $view)
                                @if ($view->id == $koordinator->id)
                                <td>
                                    <a class="btn btn-success" href="https://api.whatsapp.com/send?phone={{ $koordinator->nohp }}&text=Halo%20{{ $koordinator->name }}%2C%20Total%20matapilih%20anda%20{{ $view->total }}"><i class="fab fa-whatsapp"></i></a>
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('admin.koordinator/cetaksemua',['id' => $koordinator->id]) }}"><i class="fa fa-print"></i></a>
                                </td>
                                @endif
                              @endforeach
                              
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
{{-- <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#tanggalModal{{$koordinator->id}}"><i class="fa fa-print"></i> Pilih Tanggal</button>
<div class="modal fade" id="tanggalModal{{$koordinator->id}}" tabindex="-1" role="dialog" aria-labelledby="tanggalModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="tanggalModalLabel">Tanggal</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <form method="post" action="{{ route('admin.koordinator/cetaktanggal',['id' => $koordinator->id]) }}">
            {{csrf_field()}}
            <div class="modal-body">
                <div class="form-group">
                    <label for="startdate">Start Date</label>
                    <input type="date" class="form-control" name="startdate">
                </div>    
                <div class="form-group">
                    <label for="enddate">End Date</label>
                    <input type="date" class="form-control" name="enddate">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        </div>
    </div>
</div> --}}



@endsection
