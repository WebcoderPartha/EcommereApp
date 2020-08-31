@extends('layouts.app')
@section('css_link')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_styles.css')}}">
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-7">
                <div class="card">
                    <div class="card-header text-center">{{ __('Change Password') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('update.password') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="oldpassword" class="col-md-4 col-form-label text-md-right">{{ __('Old Password') }}</label>
                                <div class="col-md-6">
                                    <input id="oldpassword" type="password" class="form-control @error('oldpassword') is-invalid @enderror" name="oldpassword" required placeholder="Enter old password">

                                    @error('oldpassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Enter new password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="confirm_password" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                                <div class="col-md-6">
                                    <input id="confirm_password" type="password" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password" required placeholder="Retype password">

                                    @error('confirm_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <x-user-right-navbar></x-user-right-navbar>
        </div>
    </div>

@endsection
