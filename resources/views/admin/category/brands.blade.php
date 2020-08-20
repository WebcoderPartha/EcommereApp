@extends('admin.admin-master')
@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a class="breadcrumb-item" href="{{ route('brands') }}">Brands</a>
            <span class="breadcrumb-item active">Brands</span>
        </nav>

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Brands Table</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h5>Brand List <a href="#" class="btn btn-sm btn-warning pull-right" data-toggle="modal" data-target="#brands">Add New Brand</a></h5>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">SL</th>
                            <th class="wd-15p">Brand Name</th>
                            <th class="wd-15p">Brand Logo</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($brands as $key => $brand)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $brand->brand_name }}</td>
                                <td><img src="{{ asset($brand->brand_logo) }}" height="60" alt=""></td>
                                <td>
                                    <a href="{{ route('edit.brand', $brand->id) }}" class="btn btn-info">Edit</a>
                                    <a href="{{ route('delete.brand', $brand->id) }}" class="btn btn-danger" id="delete">Delete</a>
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
    <div id="brands" class="modal fade">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
                <form method="POST" action="{{ route('brands.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header pd-x-20">
                        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Category</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body pd-20">
                        <div class="form-group">
                            <label for="brand_name">Brand Name</label>
                            <input type="text" class="form-control @error('brand_name') is-invalid @enderror" id="brand_name" name="brand_name" placeholder="Brand name">
                            @error('brand_name')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="brand_name">Brand Logo</label>
                            <input type="file" class="form-control-file @error('brand_logo') is-invalid @enderror" id="brand_logo" name="brand_logo">
                            @error('brand_logo')
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
