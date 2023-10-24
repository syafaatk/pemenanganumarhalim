@extends('admin.layout')

@section('title','Dashboard')

@section('content')

  <div id="layoutSidenav_content"><div class="container-fluid">
    <h1 class="mt-4">Dashboard</h1>
    <div class="row">
      <div class="col-xl-3 col-md-6">
      <div class="card bg-primary text-white mb-4">
        <a href="{{ route('admin.dashboard') }}">
          <div class="card-body text-white">Matapilih</div>
        </a>
        <div class="card-header">{{ $matapilihs->count() }}</div>
      </div>
      </div>

      <div class="col-xl-3 col-md-6">
        <div class="card bg-warning text-white mb-4">
          <a href="{{ route('admin.category') }}">
            <div class="card-body text-white">Categories</div>
          </a>
          <div class="card-header">{{ $category->count() }}</div>
        </div>
      </div>

      <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4">
          <a href="{{ route('admin.tag') }}">
            <div class="card-body text-white">Tags</div>
          </a>
          <div class="card-header">{{ $tags->count() }}</div>
        </div>
      </div>

      {{-- <div class="col-xl-3 col-md-6">
          <div class="card bg-danger text-white mb-4">
            <a href="{{ route('admin.post/trashed') }}">
              <div class="card-body text-white">Trash Posts</div>
            </a>
            <div class="card-header">{{ $category->count() }}</div>
          </div>
      </div> --}}
    </div>


    {{-- <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card mb-4">
            </div>
        </div>
    </div> --}}

</div>
</main>

@endsection
