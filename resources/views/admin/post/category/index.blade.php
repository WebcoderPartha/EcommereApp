@extends('admin.admin-master')
@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a class="breadcrumb-item" href="#">Blog Category</a>
            <span class="breadcrumb-item active">Categorized</span>
        </nav>

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Category Table</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h5>Category List <a href="#" class="btn btn-sm btn-warning pull-right" data-toggle="modal" data-target="#modaldemo3">Add New</a></h5>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">SL</th>
                            <th class="wd-15p">Category Name EN</th>
                            <th class="wd-15p">Category Name IN</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $key => $category)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $category->category_name_en }}</td>
                                <td>{{ $category->category_name_in }}</td>
                                <td>
                                    <a href="{{ route('admin.blog.category.edit', $category->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('admin.blog.category.destroy', $category->id) }}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->
        </div><!-- sl-pagebody -->

    </div><!-- sl-mainpanel -->

    <!-- LARGE MODAL -->
    <div id="modaldemo3" class="modal fade">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
                <form method="POST" action="{{ route('admin.blog.category.store') }}">
                    @csrf
                    <div class="modal-header pd-x-20">
                        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Category</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body pd-20">
                        <div class="form-group">
                            <label for="category_name_en">Category Name EN</label>
                            <input type="text" class="form-control @error('category_name_en') is-invalid @enderror" id="category_name_en" name="category_name_en" placeholder="Category name EN">
                            @error('category_name_en')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category_name_in">Category Name IN</label>
                            <input type="text" class="form-control @error('category_name_in') is-invalid @enderror" id="category_name_in" name="category_name_in" placeholder="Category name IN">
                            @error('category_name_in')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div><!-- modal-body -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info pd-x-20">Add</button>
                        <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div><!-- modal-dialog -->
    </div><!-- modal -->
@endsection
