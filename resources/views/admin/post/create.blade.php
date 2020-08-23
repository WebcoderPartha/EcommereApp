@extends('admin.admin-master')
@section('css_link')
    <link href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet"/>
@stop
@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a class="breadcrumb-item" href="{{ route('admin.blog.list') }}">All Post</a>
            <span class="breadcrumb-item active">Post Section</span>
        </nav>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Add new post <a href="{{ route('admin.blog.list') }}" class="btn btn-sm btn-success pull-right">All Post</a></h6>
                <p class="mg-b-20 mg-sm-b-30">Fill up the post fields below</p>
                <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-layout">
                        <div class="row mg-b-0">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="post_title_en" class="form-control-label">Post Title In English: <span class="tx-danger">*</span></label>
                                    <input class="form-control @error('post_title_en') is-invalid @enderror" id="post_title_en" type="text" name="post_title_en" placeholder="Enter post title in english">
                                    @error('post_title_en')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-6 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="post_title_in" class="form-control-label">Post Title In Hindi: <span class="tx-danger">*</span></label>
                                    <input class="form-control @error('post_title_in') is-invalid @enderror" id="post_title_in" type="text" name="post_title_in" placeholder="Enter post title in hindi">
                                    @error('post_title_in')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-6 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="postcategory_id" class="form-control-label">Post Category: <span class="tx-danger">*</span></label>
                                    <select name="postcategory_id" id="postcategory_id" class="form-control select2" data-placeholder="Select Category">
                                        <option label="Select Category"></option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name_en }}</option>
                                        @endforeach
                                    </select>
                                    @error('postcategory_id')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-6 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="file" class="form-control-label">Image: <span class="tx-danger">*</span></label>
                                    <label class="custom-file mb-2" style="display: block">
                                        <input type="file" id="file" name="post_image" class="custom-file-input @error('post_image') is-invalid @enderror" onchange="readURL(this)">
                                        <span class="custom-file-control"></span>
                                    </label>
                                    @error('post_image')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                    <img src="#" alt="" id="one">
                                </div>
                            </div><!-- col-6 -->

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="summernote" class="form-control-label">Post Details In English: <span class="tx-danger">*</span></label>
                                    <textarea class="form-control @error('details_en') is-invalid @enderror" name="details_en" id="summernote"></textarea>
                                    @error('details_en')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-12 -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="details_hindi" class="form-control-label">Post Details In Hindi: <span class="tx-danger">*</span></label>
                                    <textarea class="form-control @error('details_in') is-invalid @enderror" name="details_in" id="details_hindi"></textarea>
                                    @error('details_in')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-12 -->

                        </div><!-- row -->
                    </div><!-- form layout -->
                    <div class="form-layout-footer mt-2">
                        <button class="btn btn-info mg-r-5">Add Post</button>
                        <button class="btn btn-secondary">Cancel</button>
                    </div><!-- form-layout-footer -->
                </form>
            </div><!-- card -->

        </div><!-- sl-pagebody -->

    </div><!-- sl-mainpanel -->

    <script type="text/javascript">
        // images one
        function readURL(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#one')
                        .attr('src', e.target.result)
                        .width(365)
                        .height(200);
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
        $('#summernote').summernote({
            height: 150
        });
        $('#details_hindi').summernote({
            height: 150
        })
    </script>

@stop



