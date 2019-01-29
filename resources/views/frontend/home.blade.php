@extends('frontend.layouts.master')
@section('main')
    @include('frontend.partials._heroarea')
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img class="card-img-top" src="{{ asset($product->getFirstMediaUrl('products')) }}"
                             alt="{{ $product->title }}">
                        <div class="card-body">
                            <p class="card-text">{{ $product->title }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">ADD TO CART</button>
                                </div>
                                <strong class="text-muted">
                                    BDT {{ $product->price }}{{--<br>BDT<del> 1000</del>--}}
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
