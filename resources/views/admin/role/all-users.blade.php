@extends('admin.admin-master')
@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a class="breadcrumb-item" href="#">Users</a>
            <span class="breadcrumb-item active">Admin User List</span>
        </nav>

        <div class="sl-pagebody">
            <div class="card pd-5 pd-sm-5">
                <h5>Admin List <a href="{{ route('admin.create.user') }}" class="btn btn-sm btn-warning pull-right">Add Admin</a></h5>
                <div class="table-wrapper">
                    <table id="datatable1" class="table table-hover display">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Settings</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($admin_users as $admin)
                            <tr>
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>{{ $admin->phone }}</td>
                                <td>
                                    @if($admin->category == 1)
                                        <span class="badge badge-danger">Category</span>
                                    @else
                                    @endif
                                        @if($admin->coupon == 1)
                                            <span class="badge badge-dark">Coupon</span>
                                        @else
                                        @endif
                                        @if($admin->products == 1)
                                            <span class="badge badge-info">Products</span>
                                        @else
                                        @endif
                                        @if($admin->orders == 1)
                                            <span class="badge badge-warning">Orders</span>
                                        @else
                                        @endif
                                        @if($admin->blog == 1)
                                            <span class="badge badge-primary">Blog</span>
                                        @else
                                        @endif
                                        @if($admin->reports == 1)
                                            <span class="badge badge-success">Reports</span>
                                        @else
                                        @endif
                                        @if($admin->users == 1)
                                            <span class="badge badge-warning">Users</span>
                                        @else
                                        @endif
                                        @if($admin->return_order == 1)
                                            <span class="badge badge-info">Return Order</span>
                                        @else
                                        @endif
                                        @if($admin->contact_message == 1)
                                            <span class="badge badge-success">Contact Message</span>
                                        @else
                                        @endif
                                        @if($admin->product_comment == 1)
                                            <span class="badge badge-dark">Product Comment</span>
                                        @else
                                        @endif
                                        @if($admin->site_setting == 1)
                                            <span class="badge badge-success">Site Setting</span>
                                        @else
                                        @endif
                                        @if($admin->others == 1)
                                            <span class="badge badge-danger">Others</span>
                                        @else
                                        @endif
                                </td>
                                <th class="action">
                                    <a href="{{ route('admin.user.edit', $admin->id) }}" class="btn btn-info" title="Edit"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('admin.users.destroy', $admin->id) }}" class="btn btn-danger" id="delete" title="Delete"><i class="fa fa-trash"></i></a>
                                </th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->
        </div><!-- sl-pagebody -->

    </div><!-- sl-mainpanel -->

@endsection
