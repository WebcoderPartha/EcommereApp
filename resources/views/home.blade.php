@extends('layouts.app')
@section('css_link')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_styles.css')}}">
@endsection
@section('content')
        <div class="container">
            <div class="row">
                <div class="col-7">
                    <div class="card">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Payment Type</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->order_id }}</td>
                                    <td>{{ $order->payment_type }}</td>
                                    <td>{{ $order->total }} BDT</td>
                                    <td>{{ $order->date }}</td>
                                    <td>
                                    @if($order->status == 0)
                                        <span class="badge badge-warning">Under Review</span>
                                    @elseif($order->status == 1)
                                        <span class="badge badge-primary">Accept Payment</span>
                                    @elseif($order->status == 2)
                                        <span class="badge badge-info">Handover processing</span>
                                    @elseif($order->status == 3)
                                        <span class="badge badge-success">Delivered</span>
                                    @else
                                       <span class="badge badge-">Cancelled</span>
                                    @endif
                                    </td>
                                    <td><a href="{{ route('user.order.view', $order->order_id) }}"><i style="font-size: 18px" class="fa fa-eye"></i></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <x-user-right-navbar></x-user-right-navbar>
            </div>
        </div>

@endsection
