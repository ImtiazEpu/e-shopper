@extends('frontend.layouts.master')
@section('main')
    <div class="container">
        <div class="py-5 text-center">
            <h2>Checkout form</h2>
        </div>
        <div class="alert alert-info">
            You need to <a href="{{ route('login') }}">Login</a> first to complete your Order.
        </div>
    </div>
@endsection
