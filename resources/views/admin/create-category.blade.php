@extends('admin.layout')

@section('title','Buat Kecamatan')

@section('content')

<div id="layoutSidenav_content"><div class="container-fluid">
  <h1 class="mt-4">Buat Kecamatan</h1>
  <div class="row ml-2">
    <div class="card col-sm-8 shadow p-3 mb-5 bg-white rounded">
      <div class="card-body">
        @include('layouts.errors')
        <form action="{{ route('admin.category/store') }}" method="POST">
        {{ csrf_field() }}
          <div class="form-group">
            <label>Kabupaten Kota</label>
            <input name="kabkota" type="text" class="form-control" required {{ old('kabkota') }}>
          </div>
          <div class="form-group">
            <label>Kecamatan</label>
            <input name="name" type="text" class="form-control" required {{ old('name') }}>
          </div>

          <button value="submit" class="btn btn-success">Tambah</button>
        </form>
       </div>
    </div>
  </div>
</div>
</main>

@endsection
