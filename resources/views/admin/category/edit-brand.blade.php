@extends('admin.admin-master')
@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a class="breadcrumb-item" href="{{ route('brands') }}">Brands</a>
            <span class="breadcrumb-item active">Edit Brand</span>
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
                                <form method="POST" action="{{ route('update.brand', $brand->id) }}" enctype="multipart/form-data">
                                    @csrf @method('PUT')
                                    <div class="form-group">
                                        <label for="brand_name">Brand Name</label>
                                        <input type="text" value="{{ $brand->brand_name }}" class="form-control @error('brand_name') is-invalid @enderror" id="brand_name" name="brand_name" placeholder="Brand name">
                                        @error('brand_name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="brand_logo">Brand Logo</label>
                                        <input type="file" class="form-control-file mb-4 @error('brand_logo') is-invalid @enderror" id="brand_logo" name="brand_logo">
                                        @error('brand_logo')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                        <img src="{{ asset($brand->brand_logo) }}" alt="" height="100">
                                    </div>
                                    <!-- modal-body -->
                                    <button type="submit" class="btn btn-primary">Save</button>
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
