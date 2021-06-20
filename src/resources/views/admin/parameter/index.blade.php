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
                    <h3 class="card-title border-warning">Data Parameter nilai</h3>
                </div>
                <!-- /.card-header -->

                <div class="card-body border-warning">

                    <table id="example1" class="table table-striped ">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Parameter</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($parameter as $key => $parameter)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$parameter->category->kategori}}</td>
                                <td>{{$parameter->nama_parameter}}</td>
                                <td><a href="{{ route('parameter.edit',$parameter->id) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{route('parameter.delete',$parameter->id)}}" class="btn btn-danger">Delete</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <p class="leed"><a href="{{route('parameter.create')}}" class="btn btn-success">Tambah</a></p>
        </div><!-- /.container-fluid -->
    </div>
</div>
@endsection
