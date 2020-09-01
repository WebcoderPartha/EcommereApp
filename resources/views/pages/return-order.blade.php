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
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($return_order as $order)
                            <tr>
                                <td>{{ $order->order_id }}</td>
                                <td>{{ $order->payment_type }}</td>
                                <td>{{ $order->total }} BDT</td>
                                <td>{{ $order->date }}</td>
                                <td>
                                    @if($order->return_order == 0)
                                        <span class="badge badge-info">No Request</span>
                                    @elseif($order->return_order == 1)
                                        <span class="badge badge-warning">Pending</span>
                                    @else
                                        <span class="badge badge-success">Returned</span>
                                    @endif
                                </td>
                                <td>
                                    @if($order->return_order == 0)
                                    <a class="btn btn-primary btn-sm" id="return" href="{{ route('return.order.request', $order->order_id) }}">Return</a>
                                    @elseif($order->return_order == 1)
                                        <span class="badge badge-warning">Pending</span>
                                    @else
                                        <span class="badge badge-success">Returned</span>
                                    @endif
                                </td>
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
@section('scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(document).on('click', '#return', function (e){
            e.preventDefault();
            var link = $(this).attr('href');
            swal({
                title: "Are you want to return?",
                text: "Once returned, Your money will get back!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = link;
                        // swal("Deleted successfully.", {
                        //     icon: "success",
                        // });
                    } else {
                        swal("Data safe!");
                    }
                });
        });
    </script>
@stop
