@extends('admin.layout')

@section('title','Edit Koordinator')

@section('content')

<div id="layoutSidenav_content"><div class="container-fluid">
  <h1 class="mt-4">Edit Koordinator</h1>
  <div class="row ml-2">
    <div class="card col-sm-8 shadow p-3 mb-5 bg-white rounded">
      <div class="card-body">
        @include('layouts.errors')
        <form action="{{ route('admin.koordinator/update',['id' => $koordinator->id]) }}" method="POST">
        {{ csrf_field() }}

          <div class="form-group">
            <label>Koordinator</label>
            <input name="name" type="text" value="{{ $koordinator->name }}" class="form-control">
          </div>
          <div class="form-group">
            <label>No HP</label>
            <input name="nohp" type="text" value="{{ $koordinator->nohp }}" class="form-control">
          </div>
          <hr>
          <button value="submit" class="btn btn-success">Edit</button>
        </form>
       </div>
    </div>
  </div>
</div>
</main>

@endsection
