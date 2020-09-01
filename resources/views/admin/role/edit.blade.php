@extends('admin.admin-master')
@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a class="breadcrumb-item" href="{{ route('admin.all.users') }}">All Admin User</a>
            <span class="breadcrumb-item active">Admin Users Edit Section</span>
        </nav>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Edit Admin User</h6>
                <form action="{{ route('admin.user.updates', $admin->id) }}" method="POST">
                    @csrf @method('PUT')
                    <div class="form-layout">
                        <div class="row mg-b-0">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="name" class="form-control-label">Name:</label>
                                    <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" placeholder="Enter name" value="{{ $admin->name }}">
                                    @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="phone">Phone: <span class="tx-danger">*</span></label>
                                    <input id="phone" value="{{ $admin->phone }}" class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" placeholder="Enter phone">
                                    @error('phone')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="email" class="form-control-label">Email: </label>
                                    <input value="{{ $admin->email }}" class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="email" placeholder="Enter email">
                                    @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->
                        </div><!-- row -->
                        <hr style="margin-top: 0px;">
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <h6>Permissions</h6>
                                <hr>
                            </div>
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="category" value="1" @if($admin->category ==1) checked @endif>
                                    <span>Category</span>
                                </label>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="coupon" value="1" @if($admin->coupon ==1) checked @endif>
                                    <span>Coupon</span>
                                </label>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="products" value="1" @if($admin->products ==1) checked @endif>
                                    <span>Products</span>
                                </label>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="orders" value="1" @if($admin->orders ==1) checked @endif>
                                    <span>Orders</span>
                                </label>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="blog" value="1" @if($admin->blog ==1) checked @endif>
                                    <span>Blog</span>
                                </label>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="reports" value="1" @if($admin->reports ==1) checked @endif>
                                    <span>Reports</span>
                                </label>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="users" value="1" @if($admin->users ==1) checked @endif>
                                    <span>Users</span>
                                </label>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="return_order" value="1" @if($admin->return_order ==1) checked @endif>
                                    <span>Return Order</span>
                                </label>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="contact_message" value="1" @if($admin->contact_message ==1) checked @endif>
                                    <span>Contact Message</span>
                                </label>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="product_comment" value="1" @if($admin->product_comment ==1) checked @endif>
                                    <span>Product Comment</span>
                                </label>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="site_setting" value="1" @if($admin->site_setting ==1) checked @endif>
                                    <span>Site Setting</span>
                                </label>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="others" value="1" @if($admin->others ==1) checked @endif>
                                    <span>Others</span>
                                </label>
                            </div><!-- col-4 -->
                        </div>
                    </div><!-- form layout -->
                    <div class="form-layout-footer mt-2">
                        <button type="submit" class="btn btn-info mg-r-5">Update Admin</button>
                    </div><!-- form-layout-footer -->
                </form>
            </div><!-- card -->

        </div><!-- sl-pagebody -->

    </div><!-- sl-mainpanel -->

@stop


