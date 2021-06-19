@extends('layoutAdmin.app')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    @if(Session::has('errors'))
                    <div class="alert alert-default-danger alert-dismissible fade show" role="alert">
                        Terdapat Kesalahan :
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit User</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{route('user.update',$user->id)}}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputName">Name</label>
                                    <input type="text" value="{{old('name',$user->name)}}" class="form-control" id="exampleInputEmail1" name="name" placeholder="Enter name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail">Email address</label>
                                    <input type="email" value="{{old('email',$user->email)}}" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Confirmasi Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" name="password_confirmation" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputRole" name="role">Role</label>
                                    <select class="form-control" name="role">
                                        <option>-Pilih-</option>
                                        <option>admin</option>
                                        <option>user</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
        @endsection
