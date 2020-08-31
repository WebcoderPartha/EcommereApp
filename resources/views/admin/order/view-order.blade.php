@extends('admin.admin-master')
@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a class="breadcrumb-item" href="{{ route('pending.order') }}">Orders</a>
            <span class="breadcrumb-item active">View Order</span>
        </nav>

        <div class="sl-pagebody">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Order Details</h4>
                        </div>
                        <div class="card-body">
                             <table class="table">
                                  <tr>
                                      <th>Name:</th>
                                      <th>{{ $orders->user->name }}</th>
                                  </tr>
                                 <tr>
                                     <th>Phone:</th>
                                     <th>{{ $orders->user->phone }}</th>
                                 </tr>
                                 <tr>
                                     <th>Payment Type:</th>
                                     <th>{{ $orders->payment_type  }}</th>
                                 </tr>
                                 <tr>
                                     <th>Order ID:</th>
                                     <th>{{ $orders->order_id  }}</th>
                                 </tr>
                                 <tr>
                                     <th>Discount:</th>
                                     <th>{{ $orders->discount ? $orders->discount : 0 }} BDT</th>
                                 </tr>
                                 <tr>
                                     <th>Shipping:</th>
                                     <th>{{ $orders->shipping_charge }} BDT</th>
                                 </tr>
                                 <tr>
                                     <th>Shipping:</th>
                                     <th>{{ $orders->shipping_charge }} BDT</th>
                                 </tr>
                                 <tr>
                                     <th>Vat:</th>
                                     <th>{{ $orders->vat }} BDT</th>
                                 </tr>
                                 <tr>
                                     <th>Subtotal:</th>
                                     <th>{{ $orders->subtotal }} BDT</th>
                                 </tr>
                                 <tr>
                                     <th>Total:</th>
                                     <th>{{ $orders->total }} BDT</th>
                                 </tr>
                                 <tr>
                                     <th>Date:</th>
                                     <th>{{ $orders->date }}</th>
                                 </tr>
                                 <tr>
                                     <th>Month:</th>
                                     <th>{{ $orders->month }}</th>
                                 </tr>
                                 <tr>
                                     <th>Year:</th>
                                     <th>{{ $orders->year }}</th>
                                 </tr>
                              </table>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Shipping Details</h4>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th>Name:</th>
                                    <th>{{ $shipping_details->ship_name }}</th>
                                </tr>
                                <tr>
                                    <th>Phone:</th>
                                    <th>{{ $shipping_details->ship_phone }}</th>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <th>{{ $shipping_details->ship_email  }}</th>
                                </tr>
                                <tr>
                                    <th>Address:</th>
                                    <th>{{ $shipping_details->ship_address  }}</th>
                                </tr>
                                <tr>
                                    <th>City:</th>
                                    <th>{{ $shipping_details->ship_city  }}</th>
                                </tr>
                                <tr>
                                    <th>Zip Code:</th>
                                    <th>{{ $shipping_details->ship_zipecode  }}</th>
                                </tr>
                                <tr>
                                    <th>Country:</th>
                                    <th>{{ $shipping_details->ship_country  }}</th>
                                </tr>
                                <tr>
                                    <th>Status:</th>
                                    <th>
                                        @if($orders->status == 0)
                                            <span class="badge badge-danger">Pending</span>
                                        @elseif($orders->status == 1)
                                            <span class="badge badge-info">Payment Accept</span>
                                        @elseif($orders->status == 2)
                                            <span class="badge badge-primary">Processing</span>
                                        @elseif($orders->status == 3)
                                            <span class="badge badge-success">Delivered</span>
                                        @else
                                            <span class="badge badge-warning">Cancelled</span>
                                        @endif
                                    </th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Product Details</h4>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product ID</th>
                                    <th>Product Code</th>
                                    <th>Product Name</th>
                                    <th>Color</th>
                                    <th>Size</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Total Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($Order_details as $product)
                                    <tr>
                                        <td><img src="{{ URL::to($product->product->image_one) }}" height="50px" width="50px" alt=""></td>
                                        <td>{{ $product->product_id }}</td>
                                        <td>{{ $product->product->product_code }}</td>
                                        <td>{{ $product->product->product_name }}</td>
                                        <td>{{ $product->color }}</td>
                                        <td>{{ $product->size }}</td>
                                        <td>{{ $product->qty }}</td>
                                        <td>{{ $product->single_price }} BDT</td>
                                        <td>{{ $product->total_price }} BDT</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row mb-4">
                            <div class="col-3"></div>
                            <div class="col-md-3">
                                @if($orders->status == 3 || $orders->status == 4 || $orders->status == 2 || $orders->status == 1)
                                @else
                                    <a href="{{ route('order.cancel', $orders->id) }}" class="btn btn-danger btn-block">Order Cancel</a>
                                @endif
                            </div>
                            <div class="col-md-3">
                            @if($orders->status == 0)
                                <a href="{{ route('order.accept', $orders->id) }}" class="btn btn-primary btn-block">Payment Accept</a>
                            @elseif($orders->status == 1)
                               <a href="{{ route('order.process.delivery', $orders->id) }}" class="btn btn-primary btn-block">Process Delivery</a>
                            @elseif($orders->status == 2)
                                <a href="{{ route('order.delivery.success', $orders->id) }}" class="btn btn-primary btn-block">Delivery Success</a>
                            @else
                                <div class="alert alert-success">
                                    <span>This Order delivered successfully.</span>
                                </div>
                            @endif
                            </div>
                            <div class="col-3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->

@endsection
