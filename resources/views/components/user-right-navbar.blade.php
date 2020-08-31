<div class="col-5 mb-5">
    <div class="card">
        <img src="{{ asset('media/profile/webcoder.jpg') }}" alt="" class="card-img-top" style="width: 90px; height: 90px; margin: 5px auto; border-radius: 50%">
        <div class="card-body">
            <h5 class="card-title text-center">{{Auth::user()->name}}</h5>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><a href="{{ route('user.change.password') }}">Change Password</a></li>
                <li class="list-group-item">Profile</li>
                <li class="list-group-item"><a href="{{ route('myaccount') }}">Orders</a></li>
            </ul>
        </div>
        <div class="card-body">
            <a href="{{ route('logout.user') }}" class="btn btn-danger btn-block">Sign Out</a>
        </div>
    </div>
</div>
