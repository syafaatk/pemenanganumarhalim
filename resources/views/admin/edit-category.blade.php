@extends('admin.layout')

@section('title','Edit Kecamatan')

@section('content')

<div id="layoutSidenav_content"><div class="container-fluid">
  <h1 class="mt-4">Edit Kecamatan</h1>
  <div class="row ml-2">
    <div class="card col-sm-8 shadow p-3 mb-5 bg-white rounded">
      <div class="card-body">
        @include('layouts.errors')
        <form action="{{ route('admin.category/update',['id' => $category->id]) }}" method="POST">
        {{ csrf_field() }}
          <div class="form-group">
            <label>Kabupaten Kota</label>
            <input name="kabkota" type="text" value="{{ $category->kabkota }}" class="form-control">
          </div>
          <div class="form-group">
            <label>Kecamatan</label>
            <input name="name" type="text" value="{{ $category->name }}" class="form-control">
          </div>

          <button value="submit" class="btn btn-success">Edit</button>
        </form>
       </div>
    </div>
  </div>
</div>
</main>

@endsection
