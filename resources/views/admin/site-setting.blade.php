@extends('admin.admin-master')
@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
            <span class="breadcrumb-item active">Site Setting</span>
        </nav>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Site Setting</h6>
                <form action="{{ route('sitesetting.update') }}" method="POST">
                    @csrf @method('PUT')
                    <input type="hidden" name="id" value="{{ $site_setting->id }}">
                    <div class="form-layout">
                        <div class="row mg-b-0">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="phone_one" class="form-control-label">Phone One:</label>
                                    <input class="form-control @error('phone_one') is-invalid @enderror" id="phone_one" type="text" name="phone_one" placeholder="Enter phone one" value="{{ $site_setting->phone_one }}">
                                    @error('phone_one')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="phone_two">Phone Two:</label>
                                    <input id="phone_two" value="{{ $site_setting->phone_two }}" class="form-control @error('phone_two') is-invalid @enderror" type="text" name="phone_two" placeholder="Enter phone two">
                                    @error('phone_two')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="email" class="form-control-label">Email: </label>
                                    <input value="{{ $site_setting->email }}" class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="email" placeholder="Enter email">
                                    @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="company_name">Company Name:</label>
                                    <input id="phone_two" value="{{ $site_setting->company_name }}" class="form-control @error('company_name') is-invalid @enderror" type="text" name="company_name" placeholder="Enter phone two">
                                    @error('company_name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="company_address">Company Address:</label>
                                    <input id="phone_two" value="{{ $site_setting->company_address }}" class="form-control @error('company_address') is-invalid @enderror" type="text" name="company_address" placeholder="Enter company address">
                                    @error('company_address')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="phone_two">Facebook Link:</label>
                                    <input id="facebook" value="{{ $site_setting->facebook }}" class="form-control @error('facebook') is-invalid @enderror" type="text" name="facebook" placeholder="Enter facebook link">
                                    @error('facebook')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="youtube">Youtube Link:</label>
                                    <input id="youtube" value="{{ $site_setting->youtube }}" class="form-control @error('youtube') is-invalid @enderror" type="text" name="youtube" placeholder="Enter phone two">
                                    @error('youtube')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="phone_two">Instagram Link:</label>
                                    <input id="instagram" value="{{ $site_setting->instagram }}" class="form-control @error('instagram') is-invalid @enderror" type="text" name="instagram" placeholder="Enter instagram link">
                                    @error('instagram')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="twitter">Twitter Link:</label>
                                    <input id="twitter" value="{{ $site_setting->twitter }}" class="form-control @error('twitter') is-invalid @enderror" type="text" name="twitter" placeholder="Enter twitter link">
                                    @error('twitter')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->
                        </div><!-- row -->
                        <hr style="margin-top: 0px;">
                    </div><!-- form layout -->
                    <div class="form-layout-footer mt-2">
                        <button type="submit" class="btn btn-info mg-r-5">Save Changes</button>
                    </div><!-- form-layout-footer -->
                </form>
            </div><!-- card -->

        </div><!-- sl-pagebody -->

    </div><!-- sl-mainpanel -->

@stop


