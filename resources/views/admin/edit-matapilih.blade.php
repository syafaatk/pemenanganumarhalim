@extends('admin.layout')

@section('title','Edit Mata Pilih')

@section('content')

<div id="layoutSidenav_content"><div class="container-fluid">
  <h1 class="mt-4">Edit Mata Pilih</h1>
  <div class="row ml-2">
    <div class="card col-sm-8 shadow p-3 mb-5 bg-white rounded">
      <div class="card-body">
      @include('layouts/errors')
      <form action="{{ route('admin.matapilih/update',['id' => $matapilih->id]) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}

          <div class="form-group">
            <label for="nik">NIK</label>
            <div class="input-group">
                <input disabled type="text" class="form-control" id="nik" placeholder="NIK..." value="{{ $matapilih->nik }}">
                <input name="nik" type="hidden" class="form-control" id="nik" placeholder="NIK..." value="{{ $matapilih->nik }}" required>
            </div>
          </div>
          <div class="form-group">
            <label for="nama">Nama</label>
            <input disabled type="text" class="form-control" id="nama" placeholder="Nama..." value="{{ $matapilih->nama }}">
            <input name="nama" type="hidden" class="form-control" id="nama" placeholder="Nama..." value="{{ $matapilih->nama }}" required>
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <input disabled type="text" class="form-control" id="alamat" placeholder="Alamat..." value="{{ $matapilih->alamat }}">
            <input name="alamat" type="hidden" class="form-control" id="alamat" placeholder="Alamat..." value="{{ $matapilih->alamat }}" required>
          </div>
          <div class="form-group">
            <label for="rt">RT</label>
            <input name="rt" type="text" class="form-control" id="rt" placeholder="rt..." value="{{ $matapilih->rt }}">
          </div>
          <div class="form-group">
            <label for="rw">RW</label>
            <input name="rw" type="text" class="form-control" id="rw" placeholder="rw..." value="{{ $matapilih->rw }}">
          </div>
          <div class="form-group">
            <label for="tps">TPS</label>
            <input name="tps" type="text" class="form-control" id="tps" placeholder="tps..." value="{{ $matapilih->tps }}" required>
          </div>
          <div class="form-group">
            <label for="kecamatan">Kecamatan</label>
            <input name="kecamatan" type="text" class="form-control" id="kecamatan" placeholder="kecamatan..." value="{{ $matapilih->kecamatan }}" required>
          </div>
          <div class="form-group">
            <label for="kelurahan">Kelurahan</label>
            <input name="kelurahan" type="text" class="form-control" id="kelurahan" placeholder="kelurahan..." value="{{ $matapilih->kelurahan }}" required>
          </div>
          <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <input name="jenis_kelamin" type="text" class="form-control" id="jenis_kelamin" placeholder="jenis_kelamin..." value="{{ $matapilih->jenis_kelamin }}">
          </div>
          <div class="form-group">
            <label for="nohp">Nomor HP</label>
            <input name="nohp" type="text" class="form-control" id="nohp" placeholder="nohp..." value="{{ $matapilih->nohp }}">
          </div>
          {{-- <div class="form-group">
            <label for="exampleFormControlSelect1">Select Koordinator</label> --}}
            {{-- <select name="tag[]" class="form-control single" id="exampleFormControlSelect1" multiple="multiple">
              
              @foreach($tags as $tag)
              <option value="{{ $tag->id }}">{{ $tag->tag }}--{{ $tag->kecamatan }}--{{ $tag->kelurahan }}</option>
                @foreach($matapilih->tags as $t)
                <option value="{{ $tag->id }}"
                    @if($tag->id == $t->id)
                      selected
                    @endif
                  >{{ $tag->tag }}--{{ $tag->kecamatan }}--{{ $tag->kelurahan }}</option>
                @endforeach
            @endforeach
            </select> --}}
            <div class="form-group">
              <label for="exampleFormControlSelect1">Select Koordinator</label>
              <select name="koordinator" class="form-control single" id="exampleFormControlSelect1">
                @foreach($tags as $tag)
                  <option value="{{ $tag->tag }}"
                    @if($tag->tag == $matapilih->koordinator)
                      selected
                    @endif
                  >{{ $tag->tag }}--{{ $tag->kecamatan }}--{{ $tag->kelurahan }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="nik">admin</label>
            <input type="text" disabled class="form-control" value="{{ Auth::user()->name }}" required>
            <input name="admin" type="hidden" class="form-control" id="admin" value="{{ Auth::user()->name }}" required>
          </div>

          <button value="submit" class="btn btn-success">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
</main>

<script>
    $(document).ready(function() {
        $('.single').select2();
    });
</script>

@endsection
