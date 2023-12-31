@extends('admin.layout')

@section('title','Dashboard')

@section('content')

  <div id="layoutSidenav_content"><div class="container-fluid">
    <h1 class="mt-4">Dashboard</h1>
    <div class="row">
      @foreach($viewer as $view)
      <div class="col-xl-1 col-md-2">
        <div class="card bg-danger text-white mb-4">
            <a href="">
              <div class="card-body text-white">{{ $view->name }}</div>
            </a>
            <div class="card-header">{{ $view->total }}</div>
        </div>
      </div>
      @endforeach
    </div>

  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-xl-6 col-md-12 mb-4">
        <canvas id="BarChartPalembang" width="50%" height="30%"></canvas>
      </div>
      <div class="col-xl-6 col-md-12 mb-4">
        <canvas id="BarChartBanyuasin" width="50%" height="30%"></canvas>
      </div>
    </div>
  </div>
  <div class="card mb-4">
    <div class="card-header"><i class="fas fa-table mr-1"></i>All Aktifitas</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTableaktifitas" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Tanggal</th>
                        @foreach($nama as $n)
                          <th>{{ $n->name }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($aktifitas as $akt)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $akt->tanggal }}</td>
                            @foreach($nama as $n)
                              <td>{{ $akt->{$n->name} }}</th>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</main>
<script>
  $(document).ready(function() {
  $('#dataTableaktifitas').DataTable( {
      dom: 'Bfrtip',
      buttons: [
          'copy', 'csv', 'excel', 'print',
          {
            extend: 'pdfHtml5',
            orientation: 'landscape',
            pageSize: 'LEGAL'}
      ]
  } );
} );
</script>
@endsection
