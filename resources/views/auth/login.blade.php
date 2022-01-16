@extends('layouts.app')


@section('title', 'Create your ticket')
@section('content')
    <!-- Contact section-->
    <section class="bg-light py-5">
        <div class="container px-5 my-5 px-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-6">
                    <h3>Login Now</h3>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('success'))
                    <div class="alert alert-success">
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif

                    @if (session('error'))
                    <div class="alert alert-error">
                            <p>{{ session('error') }}</p>
                        </div>
                    @endif


                    <form method="POST" action="/login">
                        @csrf

                        <div class="form-floating mb-3">
                            <input class="form-control" id="username" name="username" type="text" placeholder="username" value="{{ old('username') }}" />
                            <label for="name">Username</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" id="password" name="password" type="password" placeholder="password" />
                            <label for="name">Password</label>
                        </div>

                        <div class="mb-3">
                            <input class="form-check-input" id="remember" name="remember" type="checkbox" />
                            <label for="name">Remember Me</label>
                        </div>
                        
                        <!-- Submit Button-->
                        <div class="d-grid"><button class="btn btn-primary btn-lg" id="submitButton" type="submit">Login</button></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection