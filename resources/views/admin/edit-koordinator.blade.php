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
            <label>Keterangan</label>
            <select name="keterangan" class="form-control single" id="exampleFormControlSelect1" required>
              @if ($koordinator->keterangan == 1)
                  <option value="1" selected>USTADZ</option>
                  <option value="2">KKP</option>
                  <option value="3">Partai</option>
                  <option value="4">Keluarga</option>
              @elseif($koordinator->keterangan == 2)
                  <option value="1">USTADZ</option>
                  <option value="2" selected>KKP</option>
                  <option value="3">Partai</option>
                  <option value="4">Keluarga</option>
              @elseif($koordinator->keterangan == 3)
                  <option value="1">USTADZ</option>
                  <option value="2">KKP</option>
                  <option value="3" selected>Partai</option>
                  <option value="4">Keluarga</option>
              @elseif($koordinator->keterangan == 4)
                  <option value="1">USTADZ</option>
                  <option value="2">KKP</option>
                  <option value="3">Partai</option>
                  <option value="4" selected>Keluarga</option>
              @else
                  <option value=""></option>
                  <option value="1">USTADZ</option>
                  <option value="2">KKP</option>
                  <option value="3">Partai</option>
                  <option value="4">Keluarga</option>
              @endif
            </select>
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
