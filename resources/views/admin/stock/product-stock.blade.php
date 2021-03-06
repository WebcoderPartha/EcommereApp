@extends('admin.admin-master')
@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a class="breadcrumb-item" href="{{ route('admin.product.all') }}">All Product</a>
            <span class="breadcrumb-item active">Product Section</span>
        </nav>

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Products Table</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-5 pd-sm-5">
                <h5>Product List <a href="{{ route('admin.create.product') }}" class="btn btn-sm btn-warning pull-right">Add Product</a></h5>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display nowrap">
                        <thead>
                        <tr>
                            <th>Product Code</th>
                            <th>Product Name</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Subcategory</th>
                            <th>Brand</th>
                            <th>Quantity</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $key => $product)
                            <tr>
                                <td>{{ $product->product_code }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td><img src="{{ asset($product->image_one) }}" height="60" alt=""></td>
                                <td>{{ $product->category ? $product->category->category_name : 'Uncategorized' }}</td>
                                <td>{{ $product->subcategory ? $product->subcategory->subcategory_name : 'N/A' }}</td>
                                <td>{{ $product->brand->brand_name }}</td>
                                <td>{{$product->product_quantity}}</td>
                                <td>
                                    @if($product->status == 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->
        </div><!-- sl-pagebody -->

    </div><!-- sl-mainpanel -->

@endsection
