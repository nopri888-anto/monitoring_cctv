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
                    <h3 class="card-title ">Data Kategori</h3>
                </div>
                <!-- /.card-header -->

                <div class="card-body ">

                    <table id="example1" class="table table-striped ">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kategori as $key => $kategori)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$kategori->kategori}}</td>
                                <td><a href="{{ route('category.edit',$kategori->id) }}" class="btn btn-warning">Edit</a>
                                    <a href="{{route('category.delete',$kategori->id)}}" class="btn btn-danger">Delete</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <p class="leed"><a href="{{route('category.create')}}" class="btn btn-success">Tambah</a></p>
        </div><!-- /.container-fluid -->
    </div>
</div>
@endsection
