@extends('admin.layout')

@section('title','Create Post')

@section('content')

<div id="layoutSidenav_content"><div class="container-fluid">
  <h1 class="mt-4">Create Mata Pilih</h1>
  <div class="row ml-2">
    <div class="card col-sm-8 shadow p-3 mb-5 bg-white rounded">
      <div class="card-body">
      @include('layouts/errors')
      <form action="{{ route('admin.matapilih/store') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
          <div class="form-group">
            <label for="nik">NIK</label>
            <div class="input-group">
                <input name="nik" type="text" class="form-control" id="nik" placeholder="NIK..." value="{{ old('nik') }}" required>
                <a href="#" class="btn btn-primary" onclick="CariNIK()">Cari DPT</a>
            </div>
          </div>
          <div class="form-group">
            <label for="nama">Nama</label>
            <input name="nama" type="text" class="form-control" id="nama" placeholder="Nama..." value="{{ old('nama') }}" required>
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <input name="alamat" type="text" class="form-control" id="alamat" placeholder="Alamat..." value="{{ old('alamat') }}" required>
          </div>
          <div class="form-group">
            <label for="rt">RT</label>
            <input name="rt" type="text" class="form-control" id="rt" placeholder="rt..." value="{{ old('rt') }}">
          </div>
          <div class="form-group">
            <label for="rw">RW</label>
            <input name="rw" type="text" class="form-control" id="rw" placeholder="rw..." value="{{ old('rw') }}">
          </div>
          <div class="form-group">
            <label for="tps">TPS</label>
            <input name="tps" type="text" class="form-control" id="tps" placeholder="tps..." value="{{ old('tps') }}" required>
          </div>
          <div class="form-group">
            <label for="kecamatan">Kecamatan</label>
            <input name="kecamatan" type="text" class="form-control" id="kecamatan" placeholder="kecamatan..." value="{{ old('kecamatan') }}" required>
          </div>
          <div class="form-group">
            <label for="kelurahan">Kelurahan</label>
            <input name="kelurahan" type="text" class="form-control" id="kelurahan" placeholder="kelurahan..." value="{{ old('kelurahan') }}" required>
          </div>
          <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <input name="jenis_kelamin" type="text" class="form-control" id="jenis_kelamin" placeholder="jenis_kelamin..." value="{{ old('jenis_kelamin') }}">
          </div>
          <div class="form-group">
            <label for="nohp">Nomor HP</label>
            <input name="nohp" type="text" class="form-control" id="nohp" placeholder="nohp..." value="{{ old('nohp') }}">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Select Koordinator</label>
            <select name="tag[]" class="form-control single" id="exampleFormControlSelect1" multiple="multiple">
              @foreach($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->tag }}--{{ $tag->kecamatan }}--{{ $tag->kelurahan }}</option>
              @endforeach
            </select>
          </div>
          {{-- <div class="form-group">
            <label>Select Tags</label><br>
            <div class="form-control box">
              @foreach($tags as $tag)
              <label>
                <input type="checkbox" name="tag[]" value="{{ $tag->id }}"/>
                {{ $tag->tag }}
              </label>
              @endforeach
            </div>
          </div> --}}
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

<script>
    $(function() {
        // console.log( "ready!" );

        
    });

    function CariNIK(){
        let nik = $("#nik").val();
        if(nik == null){
            alert('NIK harus diisi!');
            return;
        }
        // console.log('id', $("#nik").val());
        $.ajax({
            url: `https://indonesian-identification-card-ktp.p.rapidapi.com/api/check?nik=${nik}`,
            headers: {
                //"X-RapidAPI-Key": "d086bd79b8mshab08176048284f6p14c2b6jsnd4e6fcb2260c",
                "X-RapidAPI-Key": "540541139cmshecfd4f767e3dc51p133e23jsn6b273bdb1615",
                "X-RapidAPI-Host": "indonesian-identification-card-ktp.p.rapidapi.com"
            },
            success: function(result){
                if(result['success'] === false){
                    alert('Terjadi Kesalahan!');
                    return;
                }

                let parse_data = result['results']['parse_data'];
                let realtime_data = result['results']['realtime_data']['data']['findNikSidalih'];
                
                $("#nama").val(realtime_data['nama']);
                $("#alamat").val(realtime_data['alamat']);
                $("#tps").val(realtime_data['tps']);
                $("#kecamatan").val(realtime_data['kecamatan']);
                $("#kecamatan_id").val(parse_data['kecamatan_id']);
                $("#kelurahan").val(realtime_data['kelurahan']);
                $("#jenis_kelamin").val(parse_data['jenis_kelamin']);
            },
            error: function(xhr, textStatus, error){
                alert('Data NIK tidak ditemukan!');
            }
            
        })
    }
    $(document).ready(function() {
        $('.single').select2();
    });
</script>
</main>

@endsection
