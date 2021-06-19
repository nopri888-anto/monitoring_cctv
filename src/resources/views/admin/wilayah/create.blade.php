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
                            <h3 class="card-title">Create Data Wilayah</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{route('wilayah.store')}}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputKodeWilayah">Kode Wilayah</label>
                                    <input type="text" class="form-control" id="exampleInputKodeWilayah" name="kode_wilayah" placeholder="Enter Kode Wilayah">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputNamaWilayah">Nama Wilayah</label>
                                    <input type="text" class="form-control" id="exampleInputNamaWilayah" name="nama_wilayah" placeholder="Enter Nama Wilayah">
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
