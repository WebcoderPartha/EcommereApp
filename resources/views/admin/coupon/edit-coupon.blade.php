@extends('admin.admin-master')
@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a class="breadcrumb-item" href="{{ route('coupons.list') }}">Coupons</a>
            <span class="breadcrumb-item active">Edit Coupon</span>
        </nav>

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="card bd-0">
                            <div class="card-header card-header-default bg-primary">
                                <h5 class="text-white">Edit Category</h5>
                            </div><!-- card-header -->
                            <div class="card-body bd bd-t-0 rounded-bottom">
                                <form method="POST" action="{{ route('coupons.update', $coupon->id) }}">
                                    @csrf @method('PUT')
                                    <div class="form-group">
                                        <label for="coupon">Coupon Code</label>
                                        <input type="text" value="{{ $coupon->coupon }}" class="form-control @error('coupon') is-invalid @enderror" id="coupon" name="coupon" placeholder="Coupon code">
                                        @error('coupon')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="discount">Discount (%)</label>
                                        <input type="text" value="{{ $coupon->discount }}" class="form-control @error('discount') is-invalid @enderror" id="discount" name="discount" placeholder="Discount percentage">
                                        @error('discount')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <!-- modal-body -->
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ route('admin.dashboard') }}" class="btn btn-warning pull-right">Cancel</a>
                                </form>
                            </div><!-- card-body -->
                        </div><!-- card -->

                    </div>
                </div>
            </div>
        </div><!-- card -->
    </div><!-- sl-pagebody -->

    </div><!-- sl-mainpanel -->
@endsection
