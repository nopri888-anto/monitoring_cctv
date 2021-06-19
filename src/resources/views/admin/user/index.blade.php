@extends('layoutAdmin.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            @if(Session::has('success'))
            <div class="alert alert-default-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                {{Session::get('success')}}
            </div>
            @endif
            <div class="card bg-bni">
                <div class="card-header border-danger">
                    <h3 class="card-title border-danger">Data User</h3>
                </div>
                <!-- /.card-header -->

                <div class="card-body border-danger">

                    <table id="example1" class="table table-striped ">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $key => $user)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->role}}</td>
                                <td><a href="{{ route('user.edit',$user->id) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{route('user.delete',$user->id)}}" class="btn btn-danger">Delete</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <p class="leed"><a href="{{route('user.create')}}" class="btn btn-success">Tambah</a></p>
        </div><!-- /.container-fluid -->
    </div>
</div>
@endsection
