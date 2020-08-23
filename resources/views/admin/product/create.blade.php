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
            <span class="breadcrumb-item active">Product Section</span>
        </nav>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Add new product <a href="{{ route('admin.product.all') }}" class="btn btn-sm btn-success pull-right">All Product</a></h6>
                <p class="mg-b-20 mg-sm-b-30">Fill up the product fields below</p>
                <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-layout">
                        <div class="row mg-b-0">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="product_name" class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                                    <input class="form-control @error('product_name') is-invalid @enderror" id="product_name" type="text" name="product_name" placeholder="Enter product name">
                                    @error('product_name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="product_code">Product Code: <span class="tx-danger">*</span></label>
                                    <input id="product_code" class="form-control @error('product_code') is-invalid @enderror" type="text" name="product_code" placeholder="Enter product code">
                                    @error('product_code')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="product_quantity" class="form-control-label">Product Quantity: <span class="tx-danger">*</span></label>
                                    <input class="form-control @error('product_quantity') is-invalid @enderror" type="text" name="product_quantity" id="product_quantity" placeholder="Enter product quantity">
                                    @error('product_code')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label for="category_id" class="form-control-label">Category: <span class="tx-danger">*</span></label>
                                    <select id="category_id" class="form-control select2 @error('product_quantity') is-invalid @enderror" name="category_id" data-placeholder="Choose Category">
                                        <option label="Choose country"></option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label for="subcategory_id" class="form-control-label">Sub Category: <span class="tx-danger">*</span></label>
                                    <select id="subcategory_id" name="subcategory_id" class="form-control select2" data-placeholder="Choose Sub-Category">
                                        <option label="Choose Sub-Category"></option>
                                    </select>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label for="brand_id" class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                                    <select id="brand_id" class="form-control select2" name="brand_id" data-placeholder="Choose brand">
                                        <option label="Choose brand"></option>
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                        @endforeach
                                       </select>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="product_size" class="form-control-label">Product Size: <span class="tx-danger">*</span></label>
                                    <input class="form-control @error('product_size') is-invalid @enderror" type="text" name="product_size" id="product_size" placeholder="Enter product size" data-role="tagsinput">
                                    @error('product_size')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-3 -->
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="product_color" class="form-control-label">Product Color: <span class="tx-danger">*</span></label>
                                    <input class="form-control @error('product_color') is-invalid @enderror" type="text" name="product_color" id="product_color" placeholder="Enter product color" data-role="tagsinput">
                                    @error('product_color')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-3 -->
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="selling_prize" class="form-control-label">Selling Price: <span class="tx-danger">*</span></label>
                                    <input class="form-control @error('selling_prize') is-invalid @enderror" type="text" name="selling_prize" id="selling_prize" placeholder="Enter selling price">
                                    @error('selling_prize')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-3 -->
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="discount_price" class="form-control-label">Discount Price: <span class="tx-danger">*</span></label>
                                    <input class="form-control @error('discount_price') is-invalid @enderror" type="text" name="discount_price" id="discount_price" placeholder="Enter discount price">
                                    @error('discount_price')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-3 -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="product_details" class="form-control-label">Product Details: <span class="tx-danger">*</span></label>
                                    <textarea class="form-control @error('product_details') is-invalid @enderror" name="product_details" id="summernote"></textarea>
                                    @error('product_details')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="file" class="form-control-label">Image One (Main): <span class="tx-danger">*</span></label>
                                    <label class="custom-file mb-2" style="display: block">
                                        <input type="file" id="file" name="image_one" class="custom-file-input @error('image_one') is-invalid @enderror" onchange="readURL(this)">
                                        <span class="custom-file-control"></span>
                                    </label>
                                    @error('image_one')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                    <img src="#" alt="" id="one">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="file" class="form-control-label">Image Two: <span class="tx-danger">*</span></label>
                                    <label class="custom-file" style="display: block">
                                        <input type="file" id="file" name="image_two" class="custom-file-input @error('image_two') is-invalid @enderror" onchange="image1URL(this)">
                                        <span class="custom-file-control"></span>
                                    </label>
                                    @error('image_two')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                    <img src="#" id="two" alt="">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="file" class="form-control-label">Image Three: <span class="tx-danger">*</span></label>
                                    <label class="custom-file" style="display: block">
                                        <input type="file" id="file" name="image_three" class="custom-file-input @error('image_three') is-invalid @enderror" onchange="image3URL(this)">
                                        <span class="custom-file-control"></span>
                                    </label>
                                    @error('image_three')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                    <img src="#" id="three" alt="">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="video_link" class="form-control-label">Video Link: <span class="tx-danger">*</span></label>
                                    <input class="form-control @error('video_link') is-invalid @enderror" type="text" name="video_link" id="video_link" placeholder="Enter video link">
                                    @error('video_link')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-6 -->
                            <div class="col-lg-6">
                                <div class="form-group mg-b-10-force">
                                    <label for="status" class="form-control-label">Status: <span class="tx-danger">*</span></label>
                                    <select id="status" name="status" class="form-control select2 @error('status') is-invalid @enderror" data-placeholder="Choose Status">
                                        <option label="Choose Status"></option>
                                        <option value="1">Active</option>
                                        <option value="0">Deactive</option>
                                    </select>
                                    @error('status')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->
                        </div><!-- row -->
                        <hr style="margin-top: 0px;">
                        <div class="row">
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="main_slider" value="1">
                                    <span>Main Slider</span>
                                </label>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="hot_deal" value="1">
                                    <span>Hot Deal</span>
                                </label>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="best_rated" value="1">
                                    <span>Best Rated</span>
                                </label>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="mid_slider" value="1">
                                    <span>Mid Slider</span>
                                </label>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="hot_new" value="1">
                                    <span>Hot New</span>
                                </label>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="trend" value="1">
                                    <span>Trend Product</span>
                                </label>
                            </div><!-- col-4 -->
                        </div>
                    </div><!-- form layout -->
                    <div class="form-layout-footer mt-2">
                        <button class="btn btn-info mg-r-5">Add Product</button>
                        <button class="btn btn-secondary">Cancel</button>
                    </div><!-- form-layout-footer -->
                </form>
            </div><!-- card -->

        </div><!-- sl-pagebody -->

    </div><!-- sl-mainpanel -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('select[name="category_id"]').on('change',function(){
                var category_id = $(this).val();
                if (category_id) {

                    $.ajax({
                        url: "{{ URL('/admin/get/subcategory') }}/"+category_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                            var d =$('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value){

                                $('select[name="subcategory_id"]').append('<option value="'+ value.id + '">' + value.subcategory_name + '</option>');

                            });
                        },
                    });

                }else{
                    alert('danger');
                }

            });

        });
        // images one
        function readURL(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#one')
                        .attr('src', e.target.result)
                        .width(80)
                        .height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        // images two
        function image1URL(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#two')
                        .attr('src', e.target.result)
                        .width(80)
                        .height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        // images three
        function image3URL(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#three')
                        .attr('src', e.target.result)
                        .width(80)
                        .height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection

@section('custom_scripts')
    <script>
        $(function(){
            'use strict';

            $('.select2').select2({
                minimumResultsForSearch: Infinity
            });
        })
    </script>
@stop


