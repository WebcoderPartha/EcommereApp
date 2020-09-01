@extends('admin.admin-master')
@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a class="breadcrumb-item" href="">Report</a>
            <span class="breadcrumb-item active">Search By Month</span>
        </nav>

        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-10">
                <h6>Month wise Total Amount: <b>{{ $total_amount }} BDT</b></h6>
                <div class="table-wrapper">
                    <table id="datatable1">
                        <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Payment Type</th>
                            <th>TXN</th>
                            <th>Vat</th>
                            <th>Shipping</th>
                            <th>Subtotal</th>
                            <th>Total</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->order_id }}</td>
                                <td>{{ $order->payment_type }}</td>
                                <td>{{ $order->balance_transaction }}</td>
                                <td>{{ $order->vat }} BDT</td>
                                <td>{{ $order->shipping_charge }} BDT</td>
                                <td>{{ $order->subtotal }} BDT</td>
                                <td>{{ $order->total }} BDT</td>
                                <td>{{ $order->date }}</td>
                                <td>
                                    @if($order->status == 3)
                                        <span class="badge badge-success">Delivered</span>
                                    @endif
                                </td>
                                <td><a href="{{ route('view.order', $order->id) }}" class="btn btn-warning"><i style="font-size: 18px" class="fa fa-eye"></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->
        </div><!-- sl-pagebody -->

    </div><!-- sl-mainpanel -->

@endsection
