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
                <div class="card-header border-warning">
                    <h3 class="card-title border-warning">Data Outlet</h3>
                </div>
                <!-- /.card-header -->

                <div class="card-body border-warning">

                    <table id="example1" class="table table-striped ">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Wilayah</th>
                                <th>Cabang</th>
                                <th>Nama Outlet</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($outlet as $key => $outlet)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$outlet->nama_wilayah}}</td>
                                <td>{{$outlet->nama_cabang}}</td>
                                <td>{{$outlet->nama_outlet}}</td>
                                <td><a href="{{ route('outlet.edit',$outlet->id) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{route('outlet.delete',$outlet->id)}}" class="btn btn-danger">Delete</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <p class="leed"><a href="{{route('outlet.create')}}" class="btn btn-success">Tambah</a></p>
        </div><!-- /.container-fluid -->
    </div>
</div>
@endsection
