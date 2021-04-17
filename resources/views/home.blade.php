@extends('layouts.master-without-nav')

@section('title') Login @endsection

@section('content')
<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-lg-4 col-md-6 col-sm-10">

            <h2 class="text-center mb-3">Student DMS</h2>

            <h5 class="text-center mb-3">Admin Login</h5>

            <form action="{{ route('login') }}" method="post">
                @csrf

                @if (session('status'))
                <div class="alert alert-danger" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                <div class="form-group mb-3">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email address"
                        required>

                    @error('email')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="enter password" required>

                    @error('password')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group text-center mb-3">
                    <button type="submit" class="btn btn-primary text-light">
                        <i class="fas fa-sign-in-alt mr-1"></i>
                        Sign In
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection