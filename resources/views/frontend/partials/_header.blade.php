<header>
    <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-7 py-4">
                    <h4 class="text-white">Categories</h4>
                    <ul class="list-unstyled">
                        @foreach($categories as $category)
                            <li>
                                <a href="{{$category->slug}}" class="text-white">{{ $category->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-sm-4 offset-md-1 py-4">
                    <h4 class="text-white">Menu</h4>
                    <ul class="list-unstyled">
                        @guest()
                            <li><a href="{{ route('register') }}" class="text-white">Create an account</a></li>
                            <li><a href="{{ route('login') }}" class="text-white">Login</a></li>
                        @endguest

                        @auth()
                            <li><a href="{{ route('profile') }}" class="text-white">My profile</a></li>
                            <li><a href="{{route('logout')}}" class="text-white">Logout</a></li>
                        @endauth
                            <li>
                                <a href="{{ route('cart.show') }}" class="btn-success btn-sm text-decoration-none"><i class="fa
                                fa-shopping-cart"></i>
                                    Cart
                                    @if($cart)
                                        <span class="badge badge-light">{{ count($cart)}}</span>
                                    @endif
                                </a>
                            </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container d-flex justify-content-between">
            <a href="{{route('frontend.home')}}" class="navbar-brand d-flex align-items-center">
                <i class="fab fa-opencart px-2"></i>
                <strong> {{ config('app.name') }}</strong>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
</header>
