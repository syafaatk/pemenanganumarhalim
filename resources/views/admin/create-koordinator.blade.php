@extends('admin.layout')

@section('title','Buat Koordinator')

@section('content')

<div id="layoutSidenav_content"><div class="container-fluid">
  <h1 class="mt-4">Buat Koordinator</h1>
  <div class="row ml-2">
    <div class="card col-sm-8 shadow p-3 mb-5 bg-white rounded">
      <div class="card-body">
        @include('layouts.errors')
        <form action="{{ route('admin.koordinator/store') }}" method="POST">
        {{ csrf_field() }}

          <div class="form-group">
            <label>Nama</label>
            <input name="name" type="text" class="form-control" required {{ old('name') }}>
          </div>
          <div class="form-group">
            <label>No HP</label>
            <input name="nohp" type="text" class="form-control" required {{ old('nohp') }}>
          </div>
          <hr>
          <button value="submit" class="btn btn-success">Tambah</button>
        </form>
       </div>
    </div>
  </div>
</div>
</main>

@endsection