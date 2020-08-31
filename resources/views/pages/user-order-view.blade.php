@extends('layouts.app')
@section('css_link')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_styles.css')}}">
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-7">
                <div class="card mb-4">
                    <div class="card-header text-center"><b>Order Details</b></div>

                    <div class="card-body">
                         <table class="table">
                          <tr>
                              <td>Payment ID:</td>
                              <td>{{ $orders->payment_id }}</td>
                          </tr>
                             <tr>
                                 <td>Paying Amount:</td>
                                 <td>{{ intval($orders->paying_amount/100) }} BDT</td>
                             </tr>
                             <tr>
                                 <td>Balance Transaction:</td>
                                 <td>{{ $orders->balance_transaction }}</td>
                             </tr>
                             <tr>
                                 <td>Payment Type:</td>
                                 <td>{{ $orders->payment_type }}</td>
                             </tr>
                             <tr>
                                 <td>Order ID:</td>
                                 <td>{{ $orders->order_id }}</td>
                             </tr>
                             <tr>
                                 <td>Discount:</td>
                                 <td>{{ $orders->discount ? $orders->discount : 0  }} BDT</td>
                             </tr>
                             <tr>
                                 <td>vat:</td>
                                 <td>{{ $orders->vat }} BDT</td>
                             </tr>
                             <tr>
                                 <td>Shipping Charge:</td>
                                 <td>{{ $orders->shipping_charge }} BDT</td>
                             </tr>
                             <tr>
                                 <td>Subtotal:</td>
                                 <td>{{ $orders->subtotal }} BDT</td>
                             </tr>
                             <tr>
                                 <td>Total:</td>
                                 <td>{{ $orders->total }} BDT</td>
                             </tr>
                             <tr>
                                 <td>Date:</td>
                                 <td>{{ $orders->date }}</td>
                             </tr>
                          </table>
                    </div>
                </div>
            </div>
            <x-user-right-navbar></x-user-right-navbar>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header text-center"><b>Product Details</b></div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Image</th>
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
                            @foreach($order_details as $product)
                                <tr>
                                    <td><img src="{{ URL::to($product->product->image_one) }}" height="100" width="100" alt=""></td>
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
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card mb-lg-5">
                    <div class="card-header text-center"><b>Shipping Details</b></div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Name:</th>
                                <th>{{ $shippings->ship_name }}</th>
                            </tr>
                            <tr>
                                <th>Phone:</th>
                                <th>{{ $shippings->ship_phone }}</th>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <th>{{ $shippings->ship_email  }}</th>
                            </tr>
                            <tr>
                                <th>Address:</th>
                                <th>{{ $shippings->ship_address  }}</th>
                            </tr>
                            <tr>
                                <th>City:</th>
                                <th>{{ $shippings->ship_city  }}</th>
                            </tr>
                            <tr>
                                <th>Zip Code:</th>
                                <th>{{ $shippings->ship_zipecode  }}</th>
                            </tr>
                            <tr>
                                <th>Country:</th>
                                <th>{{ $shippings->ship_country  }}</th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
