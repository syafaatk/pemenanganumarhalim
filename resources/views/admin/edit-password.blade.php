@extends('admin.layout')

@section('title','Change Password')

@section('content')

<div id="layoutSidenav_content"><div class="container-fluid">
    <h1 class="mt-4">Change Password</h1>
    <div class="row ml-2">
        <div class="card col-sm-8 shadow p-3 mb-5 bg-white rounded">
            <div class="card-body">
                @include('layouts.errors')
                <form action="{{ route('admin.postChangePassword') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="mb-3">
                        <label for="current_password" class="form-label">Current Password</label>
                        <input type="password" class="form-control" id="current_password" name="current_password">
                    </div>
                    <div class="mb-3">
                        <label for="new_password" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="new_password" name="new_password">
                    </div>
                    <div class="mb-3">
                        <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                        <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation">
                    </div>
                    <button value="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
</main>

@endsection
