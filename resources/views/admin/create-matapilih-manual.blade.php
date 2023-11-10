@extends('admin.layout')

@section('title','Create Post')

@section('content')

<div id="layoutSidenav_content"><div class="container-fluid">
  <h1 class="mt-4">Create Mata Pilih Manual</h1>
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
                <input name="is_manual" type="hidden" class="form-control" value="1" required>
            </div>
          </div>
          <div class="form-group">
            <small id="pesan"></small>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="nama">Nama</label>
                <input name="nama" type="text" class="form-control" id="nama" placeholder="Nama..." value="{{ old('nama') }}" required>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <input name="alamat" type="text" class="form-control" id="alamat" placeholder="Alamat..." value="{{ old('alamat') }}" required>
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
                <input name="tps" type="text" class="form-control" id="tps" placeholder="tps..." value="{{ old('tps') }}" required>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="kabupaten1">Kabupaten</label>
                <select name="kabupaten" class="form-control select2 kabupaten" id="kabupaten1" required>
                  <option></option>
                  @foreach($kabupaten as $k)
                    <option value="{{ $k->kabupaten }}">{{ $k->kabupaten }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="kecamatan1">Kecamatan</label>
                <div class="input-group">
                  <select name="kecamatan" class="form-control select2 kecamatan" id="kecamatan1" required>
                    <option></option>
                    @foreach($kecamatan as $k)
                      <option value="{{ $k->kecamatan }}">{{ $k->kecamatan }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="kelurahan">Kelurahan</label>
                <div class="input-group">
                  <select name="kelurahan" class="form-control select2 kelurahan" id="kelurahan" required>
                    <option></option>
                    @foreach($kelurahan as $k)
                      <option value="{{ $k->kelurahan }}">{{ $k->kelurahan }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="nohp">Nomor HP</label>
            <input name="nohp" type="text" class="form-control" id="nohp" placeholder="nohp..." value="{{ old('nohp') }}">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelectkoor">Select Koordinator</label>
            <select name="koordinator" class="form-control single" id="exampleFormControlSelectkoor" required>
              <option></option>
              @foreach($koordinator as $k)
                <option value="{{ $k->id }}">{{ $k->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="admin">Select Admin</label>
            <select name="user_id" class="form-control single" required>
                <option value=""></option>
              @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
              @endforeach
            </select>
          </div>
          <button value="submit" class="btn btn-success">Simpan</button>
        </form>
      </div>
    </div>
    <div class="card col-sm-4">
      <iframe src="https://cekdptonline.kpu.go.id/" title="description" seamless></iframe>
    </div>
  </div>
</div>
</main>
<script>
    var typingTimer;                //timer identifier
  var doneTypingInterval = 2000;  //time in ms (4 seconds)

  //on keyup, start the countdown
  $('#nik').keyup(function(){
      clearTimeout(typingTimer);
      if ($('#nik').val()) {
          typingTimer = setTimeout(search, doneTypingInterval);
      }
  });
  function search(){
       var keyword = $('#nik').val();
       $.post('{{ route("admin.niksearch") }}',
        {
           _token: $('meta[name="csrf-token"]').attr('content'),
           keyword:keyword
         },
         function(data){
          table_post_row(data);
            console.log(data);
         });
  }
  // table row with ajax
  function table_post_row(res){
  let htmlView = '';
  if(res.nik.length <= 0){
      htmlView+= `
         <tr>
            <td colspan="4">No data</td>
        </tr>`;
  }
  for(let i = 0; i < res.nik.length; i++){
      htmlView += `
             <td>Terdapat `+ (i+1) +` Data </td>
             <td>`+res.nik[i].nama+` diinput oleh `+res.nik[i].name+` tanggal `+res.nik[i].created_at+`</td>`;
  }
       $('#pesan').html(htmlView);
  }
  
  $(document).ready(function() {
        $('.single').select2();
        $('.kabupaten').select2({
          tags: true
        });
        $('.kecamatan').select2({
          tags: true
        });
        $('.kelurahan').select2({
          tags: true
        });
    });
</script>
@endsection
