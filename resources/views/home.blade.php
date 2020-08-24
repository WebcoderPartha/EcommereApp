@extends('layouts.app')
@section('css_link')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_styles.css')}}">
@endsection
@section('content')
        <div class="container">
            <div class="row">
                <div class="col-7">
                    <div class="card">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First</th>
                                    <th>Last</th>
                                    <th>Body</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Mark1</td>
                                    <td>Mark1</td>
                                    <td>Mark1</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Mark1</td>
                                    <td>Mark1</td>
                                    <td>Mark1</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Mark1</td>
                                    <td>Mark1</td>
                                    <td>Mark1</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Mark1</td>
                                    <td>Mark1</td>
                                    <td>Mark1</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Mark1</td>
                                    <td>Mark1</td>
                                    <td>Mark1</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-5 mb-5">
                    <div class="card">
                        <img src="{{ asset('media/profile/webcoder.jpg') }}" alt="" class="card-img-top" style="width: 90px; height: 90px; margin: 5px auto; border-radius: 50%">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{Auth::user()->name}}</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><a href="{{ route('user.change.password') }}">Change Password</a></li>
                                <li class="list-group-item">Profile</li>
                                <li class="list-group-item">Line one</li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <a href="{{ route('logout.user') }}" class="btn btn-danger btn-block">Sign Out</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
