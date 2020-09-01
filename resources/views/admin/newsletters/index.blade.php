@extends('admin.admin-master')
@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a class="breadcrumb-item" href="{{ route('admin.newsletter') }}">Newsletters</a>
            <span class="breadcrumb-item active">Newsletter List</span>
        </nav>

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Newsletters Table</h5>
            </div><!-- sl-page-title -->
            <div class="card pd-20 pd-sm-40">
                <h5>Newsletter List <a href="{{ route('newslatter.delete') }}" class="btn btn-sm btn-warning pull-right">Delete All</a></h5>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Email Address</th>
                            <th>Subscribing Time</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($newsletters as $key => $newsletter)
                            <tr>
                                <td><input type="checkbox" name="id" value="{{ $newsletter->id }}"> {{ $key + 1 }}</td>
                                <td>{{ $newsletter->email }}</td>
                                <td>{{ $newsletter->created_at->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('admin.newsletter.delete', $newsletter->id) }}" class="btn btn-danger" id="delete">Delete</a>
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

