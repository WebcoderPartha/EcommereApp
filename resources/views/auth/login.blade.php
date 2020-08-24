@extends('layouts.app')
@section('css_link')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_responsive.css')}}">
@endsection
@section('content')


    <div class="contact_form">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 offset-lg-1" style="border: 1px solid grey; padding: 20px; border-radius: 25px">
                    <div class="contact_form_container">
                        <div class="contact_form_title text-center">Sign In</div>
                        <form method="POST" action="{{ route('user.login') }}" id="contact_form">
                            @csrf
                            <div class="form-group">
                                <label for="email" class="form-control-label">Email Or Phone</label>
                                <input type="text" name="phone" id="email" value="{{ old('phone') }}" placeholder="Enter email or phone" class="form-control @error('email') is-invalid @enderror">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password" class="form-control-label">Password</label>
                                <input type="password" name="password" id="password" placeholder="Enter password" class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="contact_form_buttons">
                                <button type="submit" class="btn btn-info">Log In</button>
                             </div>
                        </form>
                        <br>
                        <a href="{{ route('password.request') }}">I forgot my password</a>
                        <button type="submit" class="btn btn-primary btn-block mt-3"><i class="fab fa-facebook-square"></i> Login with Facebook</button>
                        <button type="submit" class="btn btn-danger btn-block"><i class="fab fa-google"></i> Login with Google</button>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1" style="border: 1px solid grey; padding: 20px; border-radius: 25px">
                    <div class="contact_form_container">
                        <div class="contact_form_title text-center">Sign Up</div>
                        <form method="POST" action="{{ route('register') }}" id="contact_form">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="form-control-label">Full Name</label>
                                <input type="text" name="name" id="name" placeholder="Enter full name" class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Phone" class="form-control-label">Phone</label>
                                <input type="text" name="phone" id="Phone" placeholder="Enter phone" class="form-control @error('phone') is-invalid @enderror">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-control-label">Email</label>
                                <input type="email" name="email" id="email" required placeholder="Enter email" class="form-control @error('email') is-invalid @enderror">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password" class="form-control-label">Password</label>
                                <input type="password" name="password" id="password" required placeholder="Enter password" class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation" class="form-control-label">Password Confirm</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Retype password" class="form-control @error('password_confirmation') is-invalid @enderror">
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="contact_form_button">
                                <button type="submit" class="btn btn-info">Sign Up</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel"></div>
    </div>
@endsection
