@extends('admin.layout')

@section('title','Buat User')

@section('content')

<div id="layoutSidenav_content"><div class="container-fluid">
    <h1 class="mt-4">Buat User</h1>
    <div class="row ml-2">
        <div class="card col-sm-8 shadow p-3 mb-5 bg-white rounded">
            <div class="card-body">
                @include('layouts.errors')
                <form action="{{ route('admin.user/store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="password" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button value="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
</main>

@endsection
