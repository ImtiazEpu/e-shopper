@extends('frontend.layouts.master')
@section('main')
    <div class="container">
        <div class="py-5 text-center">
            <h2>My Profile</h2>
        </div>
    </div>

    <div class="container">
        <h2>My Order</h2>
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Order Id</th>
                            <th scope="col" class="text-center">Customer Name</th>
                            <th scope="col" class="text-center">Customer Phone Number</th>
                            <th scope="col" class="text-right">Total Amount</th>
                            <th scope="col" class="text-right">Paid Amount</th>
                            <th class="text-right">Details</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td class="text-center">{{ $order->customer_name}}</td>
                                <td class="text-center">{{ $order->customer_phone_number }}</td>
                                <td class="text-right">{{ number_format($order->total_amount, 2) }}</td>
                                <td class="text-right">{{ number_format($order->paid_amount,2) }}</td>
                                <td class="text-right">
                                    <a href="{{ route('order.details', $order->id) }}" class="btn btn-sm btn-info"><i
                                            class="fa fa-eye"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
