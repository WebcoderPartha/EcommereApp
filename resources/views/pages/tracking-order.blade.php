@extends('layouts.app')
@section('css_link')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_styles.css')}}">
@endsection
@section('content')
    <div class="container">
        <div class="row mb-lg-5 mt-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center"><h4>Your order status</h4></div>
                    <div class="card-body">
                        <div class="progress">
                        @if($track_order->status == 0)
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        @elseif($track_order->status == 1)
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        @elseif($track_order->status == 2)
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        @elseif($track_order->status == 3)
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        @else
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        @endif
                        </div>

                        @if($track_order->status == 0)
                           <h6 class="mt-3">Status: <b class="text-warning">Your order under review</b></h6>
                        @elseif($track_order->status == 1)
                            <h6 class="mt-3">Status: <b class="text-primary">Payment accept under process</b></h6>
                        @elseif($track_order->status == 2)
                            <h6 class="mt-3">Status: <b class="text-info">Packing done handover process</b></h6>
                        @elseif($track_order->status == 3)
                            <h6 class="mt-3">Status: <b class="text-success">Order delivered successfully</b></h6>
                        @else
                            <h6 class="mt-3">Status: <b class="text-danger">Order cancelled</b></h6>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"><h4>Your order details</h4></div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">Payment ID: <b>{{ $track_order->payment_id }}</b></li>
                            <li class="list-group-item">Balance Transaction: <b>{{ $track_order->balance_transaction }}</b></li>
                            <li class="list-group-item">Payment Type: <b>{{ $track_order->payment_type }}</b></li>
                            <li class="list-group-item">Order ID: <b>{{ $track_order->order_id }}</b></li>
                            <li class="list-group-item">Discount: <b>{{ $track_order->discount ? $track_order->discount : 0 }} BDT</b></li>
                            <li class="list-group-item">Vat: <b>{{ $track_order->vat }} BDT</b></li>
                            <li class="list-group-item">Shipping Charge: <b>{{ $track_order->shipping_charge }} BDT</b></li>
                            <li class="list-group-item">Subtotal: <b>{{ $track_order->subtotal }} BDT</b></li>
                            <li class="list-group-item">Total: <b>{{ $track_order->total }} BDT</b></li>
                            <li class="list-group-item">Date: <b>{{ $track_order->date }}</b></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
