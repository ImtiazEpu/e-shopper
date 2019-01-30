@extends('frontend.layouts.master')
@section('main')
    @include('frontend.partials._heroarea')
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <a href="{{ route('product.details', $product->slug) }}">
                                <img class="card-img-top" src="{{ asset($product->getFirstMediaUrl('products')) }}"
                                     alt="{{ $product->title }}">
                            </a>
                            <div class="card-body">
                                <a href="{{ route('product.details', $product->slug) }}">
                                    <p class="card-text">{{ $product->title }}</p>
                                </a>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">ADD TO CART
                                        </button>
                                    </div>
                                    <strong class="text-muted">
                                        @if($product->sale_price !== null && $product->sale_price > 0)
                                            BDT {{ $product->sale_price }}<br>
                                            <del>BDT {{ $product->price }}</del>
                                        @else
                                            BDT {{ $product->price }}
                                        @endif
                                    </strong>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $products->render() }}
        </div>
    </div>
@stop
