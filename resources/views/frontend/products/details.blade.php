@extends('frontend.layouts.master')
@section('main')
    <div class="container">
        <br>
        <p class="text-center">{{$product->title }}</p>
        <hr>

        <div class="card">
            <div class="row">
                <aside class="col-sm-5 border-right">
                    <article class="gallery-wrap">
                        <div>
                            <img src="{{ asset($product->getFirstMediaUrl('products')) }}" class="card-img-top"
                                 alt="{{$product->title }}">
                        </div> <!-- slider-product.// -->
                    </article> <!-- gallery-wrap .end// -->
                </aside>

                <aside class="col-sm-7">
                    <article class="card-body p-5">
                        <h3 class="title mb-3">{{$product->title }}</h3>
                        <p class="price-detail-wrap">
                            <span class="price h3 text-success text-right">
                                <span class="num">
                                    @if($product->sale_price !== null && $product->sale_price > 0)
                                        {{ $product->sale_price }} Tk<br>
                                        <del>{{ $product->price }} Tk</del>
                                    @else
                                        {{ $product->price }} Tk
                                    @endif
                                </span>
                            </span>
                        </p> <!-- price-detail-wrap .// -->
                        <dl class="item-property">
                            <dt>Description</dt>
                            <dd><p>{{ $product->description }}</p></dd>
                        </dl>
                        <hr>
                        <form action="" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <button type="submit" class="btn btn-lg btn-secondary">
                                <i class="fa fa-shopping-cart"></i> Add to Cart
                            </button>
                        </form>
                    </article> <!-- card-body.// -->
                </aside> <!-- col.// -->
            </div> <!-- row.// -->
        </div> <!-- card.// -->

    </div>
    <!--container.//-->
@endsection
