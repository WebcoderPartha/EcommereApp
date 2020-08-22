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

            <div class="card pd-20 pd-sm-40">
                <h5>Product List <a href="{{ route('admin.create.product') }}" class="btn btn-sm btn-warning pull-right">Add Product</a></h5>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">Code</th>
                            <th class="wd-15p">Product Name</th>
                            <th class="wd-15p">Image</th>
                            <th class="wd-15p">Category</th>
                            <th class="wd-15p">Subcategory</th>
                            <th class="wd-15p">Brand</th>
                            <th class="wd-20p">Quantity</th>
                            <th class="wd-20p">Status</th>
                            <th class="wd-20p">Action</th>
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
                                <td>
                                    <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-info" title="Edit"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('admin.product.destroy', $product->id) }}" class="btn btn-danger" id="delete" title="Delete"><i class="fa fa-trash"></i></a>
                                    <a href="{{ route('admin.product.show', $product->id) }}" class="btn btn-warning" title="Show" title="Show"><i class="fa fa-eye"></i></a>
                                @if($product->status == 1)
                                    <a href="{{ route('product.inactive', $product->id) }}" class="btn btn-danger" title="Inactive"><i class="fa fa-thumbs-down"></i></a>
                                @else
                                    <a href="{{ route('product.active', $product->id) }}" class="btn btn-info" title="Active"><i class="fa fa-thumbs-up"></i></a>
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
