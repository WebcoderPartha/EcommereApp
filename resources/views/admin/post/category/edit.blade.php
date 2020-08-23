@extends('admin.admin-master')
@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a class="breadcrumb-item" href="#">Post Category</a>
            <span class="breadcrumb-item active">Categories</span>
        </nav>

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="card bd-0">
                            <div class="card-header card-header-default bg-primary">
                                <h5 class="text-white">Edit Post Category</h5>
                            </div><!-- card-header -->
                            <div class="card-body bd bd-t-0 rounded-bottom">
                                <form method="POST" action="{{ route('admin.blog.category.update', $category->id) }}">
                                    @csrf @method('PUT')
                                    <div class="form-group">
                                        <label for="category_name_en">Category Name EN</label>
                                        <input type="text" value="{{ $category->category_name_en }}" class="form-control @error('category_name_en') is-invalid @enderror" id="category_name_en" name="category_name_en" placeholder="Category name en">
                                        @error('category_name_en')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="category_name_in">Category Name IN</label>
                                        <input type="text" value="{{ $category->category_name_in }}" class="form-control @error('category_name_in') is-invalid @enderror" id="category_name_in" name="category_name_in" placeholder="Category name in">
                                        @error('category_name_in')
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
