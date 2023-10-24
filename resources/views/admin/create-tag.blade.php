@extends('admin.layout')

@section('title','Create Tag')

@section('content')

<div id="layoutSidenav_content"><div class="container-fluid">
  <h1 class="mt-4">Create Koordinator</h1>
  <div class="row ml-2">
    <div class="card col-sm-8 shadow p-3 mb-5 bg-white rounded">
      <div class="card-body">
        @include('layouts.errors')
        <form action="{{ route('admin.tag/store') }}" method="POST">
        {{ csrf_field() }}

          <div class="form-group">
            <label>Koordinator</label>
            <input name="tag" type="text" class="form-control">
          </div>
          <div class="form-group">
            <label>Kecamatan</label>
            <input name="kecamatan" type="text" class="form-control">
          </div>
          <div class="form-group">
            <label>Kelurahan</label>
            <input name="kelurahan" type="text" class="form-control">
          </div>
          <div class="form-group">
            <label>Nomor HP</label>
            <input name="nohp" type="text" class="form-control">
          </div>

          <button value="submit" class="btn btn-success">Publish Koordinator</button>
        </form>
       </div>
    </div>
  </div>
</div>
</main>

@endsection
