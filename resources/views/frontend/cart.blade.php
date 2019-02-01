@extends('frontend.layouts.master')
@section('main')
    <section class="jumbotron text-center py-5">
        <div class="container">
            <h1 class="jumbotron-heading">YOUR SHOPPING CART</h1>
        </div>
    </section>

    <div class="container mb-4 py-2">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

        @if(empty($cart))
            <div class="alert alert-info">
                Your shopping cart is empty. Please add some product to your cart. <a href="{{ route('frontend.home')
                 }}">
                    <button class="btn btn-sm btn-success"><i class="fa fa-web"></i>Browse Products</button>
                </a>
            </div>
        @else
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Serial</th>
                                <th scope="col">Product</th>
                                <th scope="col" class="text-left">Unit Price</th>
                                <th scope="col" class="text-center">Quantity</th>
                                <th scope="col" class="text-right">Price</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $i = 1; @endphp
                            @foreach($cart as $key => $product)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $product['title'] }}</td>
                                    <td class="text-left">BDT {{ number_format($product['unit_price'],2) }}</td>
                                    <td style="width:8%"><input class="form-control" type="number" name="quantity"
                                                                value="{{
                                    $product['quantity']
                                    }}"/>
                                    </td>
                                    <td class="text-right">BDT {{ number_format($product['total_price'],2) }}</td>
                                    <td class="text-right">
                                        <form action="{{route('cart.remove')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{$key}}">
                                            <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><strong>Total</strong></td>
                                <td class="text-right"><strong>BDT {{ number_format($total, 2) }}</strong></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col mb-2">
                    <div class="row">
                        <div class="col-sm-12  col-md-6">
                            <a class="btn btn-lg btn-block btn-outline-secondary" href="{{route('frontend.home')}}">Continue
                                Shopping</a>
                        </div>
                        <div class="col-sm-12 col-md-6 text-right">
                            <a href="{{ route('checkout') }}" class="btn btn-lg btn-block btn-success text-uppercase">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{ route('cart.clear') }}" class="btn btn-danger">Clear cart</a>
        @endif
    </div>

@endsection
