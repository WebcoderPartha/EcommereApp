@extends('admin.admin-master')
@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Admin</a>
            <a class="breadcrumb-item" href="{{ route('admin.categories') }}">Category</a>
            <span class="breadcrumb-item active">Categories</span>
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
                                <form method="POST" action="{{ route('admin.category.update', $category->id) }}">
                                    @csrf @method('PUT')
                                    <div class="form-group">
                                        <label for="category_name">Category Name</label>
                                        <input type="text" value="{{ $category->category_name }}" class="form-control @error('category_name') is-invalid @enderror" id="category_name" name="category_name" placeholder="Category name">
                                        @error('category_name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
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
