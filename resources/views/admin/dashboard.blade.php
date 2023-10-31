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

      <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4">
          <a href="{{ route('admin.koordinator') }}">
            <div class="card-body text-white">Koordinator</div>
          </a>
          <div class="card-header"></div>
        </div>
      </div>
      <div class="col-xl-1 col-md-2">
        <div class="card bg-danger text-white mb-4">
            <a href="">
              <div class="card-body text-white">Palembang</div>
            </a>
            <div class="card-header"></div>
        </div>
      </div>
      <div class="col-xl-1 col-md-2">
        <div class="card bg-danger text-white mb-4">
            <a href="">
              <div class="card-body text-white">Banyuasin</div>
            </a>
            <div class="card-header"></div>
        </div>
      </div>
      <div class="col-xl-1 col-md-2">
        <div class="card bg-danger text-white mb-4">
            <a href="">
              <div class="card-body text-white">Lubuk Linggau</div>
            </a>
            <div class="card-header"></div>
        </div>
      </div>
      <div class="col-xl-1 col-md-2">
        <div class="card bg-danger text-white mb-4">
            <a href="">
              <div class="card-body text-white">Musi Banyuasin</div>
            </a>
            <div class="card-header"></div>
        </div>
      </div>
      <div class="col-xl-1 col-md-2">
        <div class="card bg-danger text-white mb-4">
            <a href="">
              <div class="card-body text-white">Musi Rawas Utara</div>
            </a>
            <div class="card-header">0</div>
        </div>
      </div>
      <div class="col-xl-1 col-md-2">
        <div class="card bg-danger text-white mb-4">
            <a href="">
              <div class="card-body text-white">Musi Rawas</div>
            </a>
            <div class="card-header">0</div>
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
    <div class="row">
      <div class="col-xl-6 col-md-12 mb-4">
        <canvas id="BarChartPalembang" width="50%" height="30%"></canvas>
      </div>
      <div class="col-xl-6 col-md-12 mb-4">
        <canvas id="BarChartBanyuasin" width="50%" height="30%"></canvas>
      </div>
    </div>
  </div>
</main>
<script>
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Bar Chart Example
var ctx = document.getElementById("BarChartPalembang");
var cty = document.getElementById("BarChartBanyuasin");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ,
    datasets: [{
      label: "PALEMBANG",
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
      data: ,
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
          maxTicksLimit: 25,
          beginAtZero: true
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          maxTicksLimit: 50,
          beginAtZero: true
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: true
    }
  }
});
var myLineChart = new Chart(cty, {
  type: 'bar',
  data: {
    labels: ,
    datasets: [{
      label: "BANYUASIN",
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
      data: ,
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
          maxTicksLimit: 25,
          beginAtZero: true
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          maxTicksLimit: 10,
          beginAtZero: true
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: true
    }
  }
});
</script>
@endsection
