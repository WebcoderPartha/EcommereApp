@extends('admin.admin-master')
@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a class="breadcrumb-item" href="{{ route('subcategory.list') }}">Sub Category</a>
            <span class="breadcrumb-item active">Edit Sub Category</span>
        </nav>

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="card bd-0">
                            <div class="card-header card-header-default bg-primary">
                                <h5 class="text-white">Edit Sub Category</h5>
                            </div><!-- card-header -->
                            <div class="card-body bd bd-t-0 rounded-bottom">
                                <form method="POST" action="{{ route('subcategory.update', $sub_category->id) }}">
                                    @csrf @method('PUT')
                                    <div class="form-group">
                                        <label for="subcategory_name">Sub Category Name</label>
                                        <input type="text" value="{{ $sub_category->subcategory_name }}" class="form-control @error('subcategory_name') is-invalid @enderror" id="subcategory_name" name="subcategory_name" placeholder="Subcategory name">
                                        @error('subcategory_name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="category_id">Category Name</label>
                                        <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                                            @foreach($categories as $category)
                                            <option
                                                value="{{ $category->id}}"
                                                @if($category->id == $sub_category->category_id)
                                                    selected
                                                @endif
                                            >{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
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
