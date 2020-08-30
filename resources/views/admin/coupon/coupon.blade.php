@extends('admin.admin-master')
@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a class="breadcrumb-item" href="{{ route('coupons.list') }}">Coupons</a>
            <span class="breadcrumb-item active">Coupons</span>
        </nav>

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Coupons Table</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h5>Coupon List <a href="#" class="btn btn-sm btn-warning pull-right" data-toggle="modal" data-target="#brands">Add New Coupon</a></h5>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Coupon Code</th>
                            <th>Coupon Percentage</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($coupons as $key => $coupon)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $coupon->coupon }}</td>
                                <td>{{ $coupon->discount }} %</td>
                                <td>
                                    <a href="{{ route('coupons.edit', $coupon->id) }}" class="btn btn-info">Edit</a>
                                    <a href="{{ route('coupons.destroy', $coupon->id) }}" class="btn btn-danger" id="delete">Delete</a>
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
                <form method="POST" action="{{ route('coupons.store') }}">
                    @csrf
                    <div class="modal-header pd-x-20">
                        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Coupon</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body pd-20">
                        <div class="form-group">
                            <label for="coupon">Coupon Code</label>
                            <input type="text" class="form-control @error('coupon') is-invalid @enderror" id="coupon" name="coupon" placeholder="Coupon name">
                            @error('coupon')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="discount">Coupon Discount (%)</label>
                            <input type="text" class="form-control @error('discount') is-invalid @enderror" id="discount" name="discount">
                            @error('discount')
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
