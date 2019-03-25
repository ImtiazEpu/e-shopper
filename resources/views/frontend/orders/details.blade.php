@extends('frontend.layouts.master')
@section('main')
    <div class="container">
        <div class="py-5 text-center">
            <h2>Order Details</h2>
        </div>
        <div class="container">
            @include('frontend.partials.message')
            <h5><strong>ORDER ID: #{{ $order->id }}</strong></h5>
            <div class="row">
                <div class="col-6">
                    <ul class="list-group">
                        <li class="list-group-item">
                            Customer Name: {{ $order->customer_name }}
                        </li>
                        <li class="list-group-item">
                            Customer Phone Number: {{ $order->customer_phone_number }}
                        </li>
                        <li class="list-group-item">
                            Address: {{ $order->address}}
                        </li>
                        <li class="list-group-item">
                            City: {{ $order->city}}
                        </li>
                        <li class="list-group-item">
                            Postal Code: {{ $order->postal_code}}
                        </li>
                        <li class="list-group-item">
                            Total Amount: {{ $order->total_amount}}
                        </li>
                        <li class="list-group-item">
                            Discount Amount: {{ $order->discount_amount}}
                        </li>
                    </ul>
                </div>
                <div class="col-6">
                    <ul class="list-group">
                        <li class="list-group-item">
                            Paid Amount: {{ $order->paid_amount}}
                        </li>
                        <li class="list-group-item">
                            Payment Status: {{ $order->payment_status}}
                        </li>
                        <li class="list-group-item">
                            Payment Details: {{ $order->payment_details}}
                        </li>
                        <li class="list-group-item">
                            Shipping Status: {{ $order->operational_status}}
                        </li>
                        <li class="list-group-item">
                            Order Process By: {{ $order->processed_by}}
                        </li>
                        <li class="list-group-item">
                            Order Created At: {{ $order->created_at}}
                        </li>
                        <li class="list-group-item">
                            Order Updated At: {{ $order->updated_at}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <h5 class="pt-5">Order Product</h5>
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">Serial No</th>
                            <th scope="col" class="text-center">Product Title</th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col" class="text-right">Total Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $i = 1; @endphp
                        @foreach($order->products as $product )
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td class="text-center">{{ $product->product->title}}</td>
                                <td class="text-center">{{ $product->quantity }}</td>
                                <td class="text-right">{{ number_format($product->price,2) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
