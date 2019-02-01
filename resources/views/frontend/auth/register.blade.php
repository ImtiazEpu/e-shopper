@extends('frontend.layouts.master')
@section('main')
    <div class="container">
        <div class="py-5 text-center">
            <h2>Registration</h2>
        </div>
        @include('frontend.partials.message')
        <form action="{{ route('register') }}" method="post" class="form">
            @csrf
            <div class="form-group">
                <label for="exampleInputname1">Full Name</label>
                <input type="text" class="form-control" id="exampleInputname1" name="name" value="{{ old('name') }}"
                       placeholder="Enter Fullname">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="text" class="form-control" id="exampleInputEmail1" value="{{ old('email') }}"
                       aria-describedby="emailHelp"
                       name="email" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.
                </small>
            </div>
            <div class="form-group">
                <label for="exampleInputphone1">Phone Number</label>
                <input type="text" class="form-control" id="exampleInputphone1" name="phone_number" value="{{ old
                ('phone_number') }}" placeholder="Phone number">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password"
                       placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection
