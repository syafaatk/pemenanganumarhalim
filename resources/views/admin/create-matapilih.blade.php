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
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" disabled class="form-control" id="nama1" value="{{ old('nama') }}" required>
                <input name="nama" type="hidden" class="form-control" id="nama" placeholder="Nama..." value="{{ old('nama') }}" required>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" disabled class="form-control" id="alamat1" value="{{ old('alamat') }}" required>
                <input name="alamat" type="hidden" class="form-control" id="alamat" placeholder="Alamat..." value="{{ old('alamat') }}" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="rt">RT</label>
                <input name="rt" type="text" class="form-control" id="rt" placeholder="rt..." value="{{ old('rt') }}">
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="rw">RW</label>
                <input name="rw" type="text" class="form-control" id="rw" placeholder="rw..." value="{{ old('rw') }}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="tps">TPS</label>
                <input type="text" disabled class="form-control" id="tps1"  value="{{ old('tps') }}" required>
                <input name="tps" type="hidden" class="form-control" id="tps" placeholder="tps..." value="{{ old('tps') }}" required>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="kabupaten">Kabupaten</label>
                <input type="text" disabled class="form-control" id="kabupaten1" value="{{ old('kabupaten') }}" required>
                <input name="kabupaten" type="hidden" class="form-control" id="kabupaten" placeholder="kabupaten..." value="{{ old('kabupaten') }}" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="kecamatan">Kecamatan</label>
                <input type="text" disabled class="form-control" id="kecamatan1" value="{{ old('kecamatan') }}" required>
                <input name="kecamatan" type="hidden" class="form-control" id="kecamatan" placeholder="kecamatan..." value="{{ old('kecamatan') }}" required>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="kelurahan">Kelurahan</label>
                <input type="text" disabled class="form-control" id="kelurahan1" value="{{ old('kelurahan') }}" required>
                <input name="kelurahan" type="hidden" class="form-control" id="kelurahan" placeholder="kelurahan..." value="{{ old('kelurahan') }}" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="nohp">Nomor HP</label>
            <input name="nohp" type="text" class="form-control" id="nohp" placeholder="nohp..." value="{{ old('nohp') }}">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Select Koordinator</label>
            <select name="koordinator" class="form-control single" id="exampleFormControlSelect1" required>
              <option></option>
              @foreach($koordinator as $k)
                <option value="{{ $k->id }}">{{ $k->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="nik">admin</label>
            <input type="text" disabled class="form-control" value="{{ Auth::user()->name }}" required>
            <input name="user_id" type="hidden" class="form-control" id="admin" value="{{ Auth::user()->id }}" required>
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
                "X-RapidAPI-Key": "d086bd79b8mshab08176048284f6p14c2b6jsnd4e6fcb2260c",
                //"X-RapidAPI-Key": "d086bd79b8mshab08176048284f6p14c2b6jsnd4e6fcb2260c",
                // "X-RapidAPI-Key": "540541139cmshecfd4f767e3dc51p133e23jsn6b273bdb1615",
                //"X-RapidAPI-Key": "4ffe7dbe87msh7cd86002f0083b6p142c04jsn2c2e55d1c550",
                //"X-RapidAPI-Key": "6f3c23f051msh7222ed97b475a0dp1668b2jsnebcce03f9805",
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
                $("#kabupaten").val(realtime_data['kabupaten']);
                $("#kelurahan").val(realtime_data['kelurahan']);
                $("#nama1").val(realtime_data['nama']);
                $("#alamat1").val(realtime_data['alamat']);
                $("#tps1").val(realtime_data['tps']);
                $("#kecamatan1").val(realtime_data['kecamatan']);
                $("#kabupaten1").val(realtime_data['kabupaten']);
                $("#kelurahan1").val(realtime_data['kelurahan']);
                $("#jenis_kelamin1").val(parse_data['jenis_kelamin']);
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
