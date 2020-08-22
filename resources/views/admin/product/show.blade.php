@extends('admin.admin-master')
@section('css_link')
    <link href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet"/>
@stop
@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a class="breadcrumb-item" href="{{ route('admin.product.all') }}">All Product</a>
            <span class="breadcrumb-item active">View Product</span>
        </nav>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Product Details Page </h6>
                    <div class="form-layout">
                        <div class="row mg-b-0">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="product_name" class="form-control-label">Product Name:</label>
                                    <strong>$product->product_name</strong>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="product_code">Product Code:</label>
                                    <strong>{{$product->product_code}}</strong>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="product_quantity" class="form-control-label">Product Quantity:</label>
                                    <strong>{{$product->product_quantity}}</strong>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label for="category_id" class="form-control-label">Category: </label>
                                    <strong>{{$product->category->category_name}}</strong>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label for="subcategory_id" class="form-control-label">Sub Category: </label>
                                    <strong>{{$product->subcategory->subcategory_name}}</strong>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label for="brand_id" class="form-control-label">Brand: </label>
                                    <strong>{{$product->brand->brand_name}}</strong>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="product_size" class="form-control-label">Product Size:</label>
                                    <strong>{{$product->product_size}}</strong>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="product_color" class="form-control-label">Product Color: </label>
                                    <strong>{{$product->product_color}}</strong>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="selling_prize" class="form-control-label">Selling Price: </label>
                                    <strong>{{$product->selling_prize}}</strong>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="product_details" class="form-control-label">Product Details:</label>
                                    <strong>{!! $product->product_details !!}</strong>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="file" class="form-control-label">Image One (Main):</label>
                                    <img src="{{ asset($product->image_one) }}" alt="" id="one">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="file" class="form-control-label">Image Two: </label>
                                        <img src="{{ asset($product->image_two) }}" alt="" id="one">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="file" class="form-control-label">Image Three: </label>
                                    <img src="{{ asset($product->image_three) }}" alt="" id="one">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="video_link" class="form-control-label">Video Link: </label>
                                    <iframe src="{{$product->video_link}}"  width="100%" height="500" frameborder="0"></iframe>
                                </div>
                            </div><!-- col-6 -->
                        </div><!-- row -->
                        <hr>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="file" class="form-control-label">Main Slider: </label>
                                    @if($product->main_slider == 1)
                                    <span class="badge badge-success">Active</span>
                                    @else
                                    <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="file" class="form-control-label">Hot Deal: </label>
                                    @if($product->hot_deal == 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="file" class="form-control-label">Best Rated: </label>
                                    @if($product->best_rated == 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="file" class="form-control-label">Mid Slider: </label>
                                    @if($product->mid_slider == 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="file" class="form-control-label">Trend</label>
                                    @if($product->trend == 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="file" class="form-control-label">Status</label>
                                    @if($product->status == 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </div>
                            </div><!-- col-4 -->
                        </div>

                    </div><!-- form layout -->
            </div><!-- card -->

        </div><!-- sl-pagebody -->

    </div><!-- sl-mainpanel -->

@stop


