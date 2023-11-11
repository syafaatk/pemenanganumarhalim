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
        @if(Auth::user()->super_admin == "2")
        <div class="form-group">
          <label for="admin">Select Admin</label>
          <select name="user_id" class="form-control single" id="admin">
            @foreach($users as $user)
              <option value="{{ $user->id }}"
                @if($user->id == $matapilih->user_id)
                  selected
                @endif
              >{{ $user->name }}</option>
            @endforeach
          </select>
        </div>
        @endif
        @if(Auth::user()->super_admin == "1")
        <div class="form-group">
          <label for="admin">Admin</label>
          <input type="text" disabled class="form-control" value="{{ $matapilih->user->name }}">
          <input name="user_id" type="hidden" class="form-control" id="admin" value="{{ $matapilih->user_id }}" required>
        </div>
        <div class="form-group">
          <label for="nik">NIK</label>
          <div class="input-group">
              <input name="nik" type="text" class="form-control" id="nik" placeholder="NIK..." value="{{ $matapilih->nik }}" required>
              <input name="is_manual" type="hidden" class="form-control" value="{{ $matapilih->is_manual }}" required>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="form-group">
              <label for="nama">Nama</label>
              <input name="nama" type="text" class="form-control" id="nama" placeholder="Nama..." value="{{ $matapilih->nama }}" required>
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <input name="alamat" type="text" class="form-control" id="alamat" placeholder="Alamat..." value="{{ $matapilih->alamat }}" required>
            </div>
          </div>
        </div>
        @endif
        @if(Auth::user()->super_admin == "0")
        <div class="form-group">
          <label for="admin">Admin</label>
          <input type="text" disabled class="form-control" value="{{ $matapilih->user->name }}">
          <input name="user_id" type="hidden" class="form-control" id="admin" value="{{ $matapilih->user_id }}" required>
        </div>
        <div class="form-group">
          <label for="nik">NIK</label>
          <div class="input-group">
              <input disabled type="text" class="form-control" id="nik" placeholder="NIK..." value="{{ $matapilih->nik }}">
              <input name="nik" type="hidden" class="form-control" id="nik" placeholder="NIK..." value="{{ $matapilih->nik }}" required>
              <input name="is_manual" type="hidden" class="form-control" value="{{ $matapilih->is_manual }}" required>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="form-group">
              <label for="nama">Nama</label>
              <input disabled type="text" class="form-control" id="nama" placeholder="Nama..." value="{{ $matapilih->nama }}">
              <input name="nama" type="hidden" class="form-control" id="nama" placeholder="Nama..." value="{{ $matapilih->nama }}" required>
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <input disabled type="text" class="form-control" id="alamat" placeholder="Alamat..." value="{{ $matapilih->alamat }}">
              <input name="alamat" type="hidden" class="form-control" id="alamat" placeholder="Alamat..." value="{{ $matapilih->alamat }}" required>
            </div>
          </div>
        </div>
        @endif
          
            
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="rt">RT</label>
                <input name="rt" type="text" class="form-control" id="rt" placeholder="rt..." value="{{ $matapilih->rt }}">
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="rw">RW</label>
                <input name="rw" type="text" class="form-control" id="rw" placeholder="rw..." value="{{ $matapilih->rw }}">
              </div>
            </div>
          </div>
          @if(Auth::user()->super_admin == "1")
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="tps">TPS</label>
                <input name="tps" type="text" class="form-control" id="tps" placeholder="tps..." value="{{ $matapilih->tps }}" required>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="kabupaten">Kabupaten</label>
                <input name="kabupaten" type="text" class="form-control" id="kabupaten" placeholder="kabupaten..." value="{{ $matapilih->kabupaten }}" required>
              </div>
            </div>
          </div>
          @endif
          @if(Auth::user()->super_admin == "0")
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="tps">TPS</label>
                <input type="text" disabled class="form-control" id="tps1"  value="{{ $matapilih->tps }}" required>
                <input name="tps" type="hidden" class="form-control" id="tps" placeholder="tps..." value="{{ $matapilih->tps }}" required>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="kabupaten">Kabupaten</label>
                <input type="text" disabled class="form-control" id="kabupaten1" value="{{ $matapilih->kabupaten }}" required>
                <input name="kabupaten" type="hidden" class="form-control" id="kabupaten" placeholder="kabupaten..." value="{{ $matapilih->kabupaten }}" required>
              </div>
            </div>
          </div>
          @endif
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="kecamatan">Kecamatan</label>
                <input name="kecamatan" type="text" class="form-control" id="kecamatan" placeholder="kecamatan..." value="{{ $matapilih->kecamatan }}" required>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="kelurahan">Kelurahan</label>
                <input name="kelurahan" type="text" class="form-control" id="kelurahan" placeholder="kelurahan..." value="{{ $matapilih->kelurahan }}" required>
              </div>  
            </div>
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
                @foreach($koordinators as $koordinator)
                  <option value="{{ $koordinator->id }}"
                    @if($koordinator->id == $matapilih->koordinator_id)
                      selected
                    @endif
                  >{{ $koordinator->name }}</option>
                @endforeach
              </select>
            </div>
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
