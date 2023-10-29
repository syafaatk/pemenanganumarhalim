@extends('admin.layout')

@section('title','Dashboard')

@section('content')

  <div id="layoutSidenav_content"><div class="container-fluid">
    <h1 class="mt-4">Dashboard</h1>
    <div class="row">
      <div class="col-xl-3 col-md-6">
      <div class="card bg-primary text-white mb-4">
        <a href="{{ route('admin.dashboard') }}">
          <div class="card-body text-white">Matapilih</div>
        </a>
        <div class="card-header">{{ $matapilihs->count() }}</div>
      </div>
      </div>

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

      <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4">
          <a href="{{ route('admin.koordinator') }}">
            <div class="card-body text-white">Koordinator</div>
          </a>
          <div class="card-header">{{ $koordinators->count() }}</div>
        </div>
      </div>

      {{-- <div class="col-xl-3 col-md-6">
          <div class="card bg-danger text-white mb-4">
            <a href="{{ route('admin.post/trashed') }}">
              <div class="card-body text-white">Trash Posts</div>
            </a>
            <div class="card-header">{{ $category->count() }}</div>
          </div>
      </div> --}}
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
  <div class="container-fluid">
    <div class="card mb-4">
      <canvas id="myBarChart" width="100%" height="30%"></canvas>
    </div>
  </div>
</main>
<script>
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: {!! ($kecamatan_nama) !!},
    datasets: [{
      label: "Total",
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
      data: {{$kecamatan_total}},
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'Kecamatan'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 19,
          beginAtZero: true
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 2000,
          maxTicksLimit: 50,
          beginAtZero: true
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: false
    }
  }
});
</script>
@endsection
