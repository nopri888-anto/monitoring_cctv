@extends('layoutAdmin.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <section>
                <div class="row">
                    <div class="col-lg-8">
                        <p><strong>Selamat datang {{ $user->name }}!</strong> Anda telah melakukan login sebagai {{ $user->role }}</p>
                    </div>
                    <div class="col-lg-4">
                        <div class="" role="alert">

                        </div>
                    </div>
                </div>
            </section>
        </div><!-- /.container-fluid -->
    </div>
</div>


@endsection
