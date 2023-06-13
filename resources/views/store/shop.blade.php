{{-- <x-layouts.app>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app> --}}


<x-layouts.app>
    <section class="home-slider owl-carousel">

        <div class="slider-item" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">Order Online</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span>
                            <span>Shop</span>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <section class="ftco-menu mb-5 pb-5">
        <div class="container">
            <div class="row d-md-flex">
                <div class="col-lg-12 ftco-animate p-md-5">
                    <div class="row">
                        <div class="col-md-12 nav-link-wrap mb-5">
                            <div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab"
                                role="tablist" aria-orientation="vertical">
                                {{$first = $categories[0]}}
                                @foreach ($categories as $category)
                                    <a class="nav-link {{$category->id==$first->id ? 'active' : '' }}" id={{ 'pill-'.$category->slug . '-tab' }} data-toggle="pill"
                                        href={{ '#' . $category->slug }} role="tab">{{ $category->name }}</a>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-12 d-flex align-items-center">

                            <div class="tab-content ftco-animate" id="v-pills-tabContent">

                                @foreach ($categories as $category)
                                    <div class="tab-pane fade show" id={{ $category->slug }} role="tabpanel">
                                        <div class="row">
                                            @foreach ($products as $product)
                                                @if ($product->category->id == $category->id)
                                                    <div class="col-md-3">
                                                        <div class="menu-entry">
                                                            <a href="#" class="img"
                                                            style="background-image: url( {{asset('assets/store/images/products/'. $product->cover ) }} );"></a>
                                                            <div class="text text-center pt-4">
                                                                <h3><a href="product-single.html">{{$product->name}}</a>
                                                                </h3>
                                                                <p>{{$product->description}}</p>
                                                                <p class="price"><span>€ {{$product->price}}</span></p>
                                                                <button onClick="addToCart((createItem({{$product->id}},{{$product->price}},{{$product->id}})))" href="cart.html"
                                                                        class="btn btn-primary btn-outline-primary">Add
                                                                        to Cart</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>
