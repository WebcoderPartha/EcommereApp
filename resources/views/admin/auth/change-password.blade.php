@extends('admin.admin-master')
@section('admin_content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Admin</a>
            <span class="breadcrumb-item active">Dashboard</span>
        </nav>
        <div class="sl-pagebody">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card pd-20 pd-sm-40 form-layout form-layout-5">
                        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">{{Auth::user()->name}}</h6>
                        <p class="mg-b-30 tx-gray-600">If you want to change your password, then fill up the fields below.</p>
                        <form method="POST" action="{{ route('admin.update.password') }}">
                            @csrf @method('PUT')
                            <div class="row row-xs mb-3">
                                <label class="col-sm-4 form-control-label" id="oldPassword">Old Password:</label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input type="password" class="form-control @error('oldPassword') is-invalid @enderror" name="oldPassword" id="oldPassword" placeholder="Enter old password">
                                    @error('oldPassword')
                                        <span class="invalid-feedback">
                                            {{$message}}
                                        </span>
                                    @enderror
                                </div>
                            </div><!-- row -->
                            <div class="row row-xs mb-3">
                                <label class="col-sm-4 form-control-label" id="password">New Password:</label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="oldPassword" placeholder="Enter new password">
                                    @error('password')
                                    <span class="invalid-feedback">
                                            {{$message}}
                                        </span>
                                    @enderror
                                </div>
                            </div><!-- row -->
                            <div class="row row-xs mb-3">
                                <label class="col-sm-4 form-control-label" id="password_confirmation">Old Password:</label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation" placeholder="Enter confirm password">
                                    @error('password_confirmation')
                                    <span class="invalid-feedback">
                                            {{$message}}
                                        </span>
                                    @enderror
                                </div>
                            </div><!-- row -->
                            <div class="row row-xs mg-t-30">
                                <div class="col-sm-8 mg-l-auto">
                                    <div class="form-layout-footer">
                                        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Cancel</a>
                                        <button class="btn btn-info mg-r-5" style="cursor: pointer">Update Password</button>
                                    </div><!-- form-layout-footer -->
                                </div><!-- col-8 -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
