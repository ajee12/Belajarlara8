@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-5 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">LOGIN LARAVEL</h1>
                        </div>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email addres" name="email" id="email" value="">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>



                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <!--
                            <div class="form-group row">
                                <div class="col-md-6 m-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            -->

                            <hr>
                            <button type="submit" class="btn btn-xs btn-success btn-block mt-2">Login</button></a>
                            <hr>
                    </div>



                    <hr>
                    <div class="text-center ">
                        <a class="small " href="/register ">Buat Akun Baru </a>
                        <br><a class="small " href="forgot-password.html ">Forgot Password </a>
                    </div>
                    <hr>

                </div>
            </div>
            </form>
        </div>
        @endsection
