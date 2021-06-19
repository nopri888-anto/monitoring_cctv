@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-md-center mt-12">
        <div class="col-md-4 col-sm-4 col-lg-4"></div>
        <div class="col-md-4 col-sm-4 col-lg-4">
            <div class="card text-center">
                <div class="card-header">
                    <img src="vendor/adminLte/dist/img/logo2.png" class="img-index" alt="">
                </div>

                <div class="card-body">
                    <h5 class="card-title">Audit & Monitoring Service Quality</h5>
                    <p class="sub-title-card">Masuk</p>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <div class="col-md">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-2">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Lupa Sandi?') }}
                    </a>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-4 col-lg-4"></div>
    </div>
</div>
@endsection
