@extends('admin.admin-master')
@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a class="breadcrumb-item" href="">Report</a>
            <span class="breadcrumb-item active">Search Report</span>
        </nav>

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="text-center">Search By Date</h5>
                            </div><!-- card-header -->
                            <div class="card-body p-5">
                                <form method="POST" action="{{ route('date.by.search') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="date" class="form-control" name="date">
                                    </div>
                                    <!-- modal-body -->
                                    <button type="submit" class="btn btn-success text-center">Search</button>
                                </form>
                            </div><!-- card-body -->
                        </div><!-- card -->
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="text-center">Search By Month</h5>
                            </div><!-- card-header -->
                            <div class="card-body p-5">
                                <form method="POST" action="{{ route('search.by.month') }}">
                                    @csrf
                                    <div class="form-group">
                                        <select name="month" class="form-control">
                                            <option value="January">January</option>
                                            <option value="February">February</option>
                                            <option value="March">March</option>
                                            <option value="April">April</option>
                                            <option value="May">May</option>
                                            <option value="June">June</option>
                                            <option value="July">July</option>
                                            <option value="August">August</option>
                                            <option value="September">September</option>
                                            <option value="October">October</option>
                                            <option value="November">November</option>
                                            <option value="December">December</option>
                                        </select>
                                    </div>
                                    <!-- modal-body -->
                                    <button type="submit" class="btn btn-success text-center">Search</button>
                                </form>
                            </div><!-- card-body -->
                        </div><!-- card -->
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="text-center">Search By Year</h5>
                            </div><!-- card-header -->
                            <div class="card-body p-5">
                                <form method="POST" action="{{ route('search.by.year') }}">
                                    @csrf
                                    <div class="form-group">
                                        <select name="year" class="form-control">
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                        </select>
                                    </div>
                                    <!-- modal-body -->
                                    <button type="submit" class="btn btn-success text-center">Search</button>
                                </form>
                            </div><!-- card-body -->
                        </div><!-- card -->
                    </div>
                </div>
            </div>
        </div><!-- card -->
    </div><!-- sl-pagebody -->

    </div><!-- sl-mainpanel -->
@endsection
