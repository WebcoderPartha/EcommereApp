@extends('admin.admin-master')
@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a class="breadcrumb-item" href="{{ route('pending.order') }}">Orders</a>
            <span class="breadcrumb-item active">Accepted Order</span>
        </nav>

        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-10">
                <h6>Order List</h6>
                <div class="table-wrapper">
                    <table id="datatable1">
                        <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Payment Type</th>
                            <th>TXN</th>
                            <th>Total</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($return_order as $order)
                            <tr>
                                <td>{{ $order->order_id }}</td>
                                <td>{{ $order->payment_type }}</td>
                                <td>{{ $order->balance_transaction }}</td>
                                <td>{{ $order->total }} BDT</td>
                                <td>{{ $order->date }}</td>
                                <td>
                                    @if($order->return_order == 1)
                                        <span class="badge badge-warning">Pending</span>
                                    @elseif($order->return_order == 2)
                                        <span class="badge badge-success">Returned</span>
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
