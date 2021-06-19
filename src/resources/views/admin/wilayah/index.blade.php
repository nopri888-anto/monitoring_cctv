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
            <div class="card">
                <div class="card-header border-danger">
                    <h3 class="card-title ">Data Wilayah</h3>
                </div>
                <!-- /.card-header -->

                <div class="card-body ">

                    <table id="example1" class="table table-striped ">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Wilayah</th>
                                <th>Nama Wilayah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($wilayah as $key => $wilayah)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$wilayah->kode_wilayah}}</td>
                                <td>{{$wilayah->nama_wilayah}}</td>
                                <td><a href="{{ route('wilayah.edit',$wilayah->id) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{route('wilayah.delete',$wilayah->id)}}" class="btn btn-danger">Delete</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <p class="leed"><a href="{{route('wilayah.create')}}" class="btn btn-success">Tambah</a></p>
        </div><!-- /.container-fluid -->
    </div>
</div>
@endsection
