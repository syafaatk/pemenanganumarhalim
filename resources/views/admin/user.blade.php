@extends('admin.layout')

@section('title','User')

@section('content')
<div id="layoutSidenav_content"><div class="container-fluid">
    <h1 class="mt-4">User</h1>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <a class="btn btn-primary" href="{{ route('admin.user/create') }}">
                    Tambah User
                </a>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>User</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Is Superuser</th>
                            <th>Is Active</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($users as $user)
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            @if($user->super_admin == 1)
                                <td class=""><a class="btn btn-success" style="color: #fff;">Yes</a></td>
                            @else
                                <td class=""><a class="btn btn-danger" style="color: #fff;">No</a></td>
                            @endif
                            @if($user->is_active == 1)
                                <td class=""><a class="btn btn-success" style="color: #fff;">Yes</a></td>
                            @else
                                <td class=""><a class="btn btn-danger" style="color: #fff;">No</a></td>
                            @endif
                            <td class="">
                                <a class="btn btn-success" href="{{ route('admin.user/active',['id' => $user->id]) }}">Change Status</a>
                                {{-- <a class="btn btn-danger" href="{{ route('admin.user/delete',['id' => $user->id]) }}">Delete</a> --}}
                            </td>
                          </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</main>

@endsection
