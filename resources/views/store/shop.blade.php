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
                <div class="col-lg-12 ftco-animate p-md-5" id="contentSection">
                    <div class="row">
                        <div class="col-md-12 nav-link-wrap mb-5">
                            @if (count($products) > 0)
                                <div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab"
                                    role="tablist" aria-orientation="vertical">
                                    @foreach ($categories as $category)
                                        <a class="nav-link {{ $category->id == $categories[0]->id ? 'active' : '' }}"
                                            id={{ 'pill-' . $category->slug . '-tab' }} data-toggle="pill"
                                            href={{ '#' . $category->slug }} role="tab">{{ $category->name }}</a>
                                    @endforeach
                                </div>
                        </div>
                        <div class="col-md-12 d-flex align-items-center">
                            <div class="tab-content ftco-animate" id="v-pills-tabContent">
                                @foreach ($categories as $category)
                                    <div class="tab-pane fade {{ $category->id == $categories[0]->id ? 'show active' : '' }} " id={{ $category->slug }} role="tabpanel">
                                        <div class="row">
                                            @foreach ($products as $product)
                                                @if ($product->category->id == $category->id)
                                                    <div class="col-md-3"style="min-width:250px !important;">
                                                        <div class="menu-entry">
                                                            <a href="#" class="img"
                                                                style="background-image: url({{($product->cover ? asset('assets/store/images/products/' . $product->cover) : asset('assets/store/images/placeholder.jpg'))}}"></a>
                                                            <div class="text text-center pt-4">
                                                                <h3><a href="{{ route('store.shop.single', $product) }}">{{ $product->name }}</a></h3>
                                                                <p>{{ $product->description }}</p>
                                                                {{-- <p>asd asd asd asd asd asd asd asd asd asd asd asd asd asd asd asd asd asd asd asd asd asd asd asd asd asd asd asd asd asd asd asd asd asd asd asd
                                                                </p> --}}
                                                                <p class="price"><span>€ {{ $product->price }}</span>
                                                                </p>
                                                                <button
                                                                    onClick="addToCart((createItem( {{ $product->id }} , '{{$product->name}}', {{ $product->price }} , 1 )));showAlert();"
                                                                    href="cart.html"
                                                                    class="btn btn-primary btn-outline-primary">Aggiungi al carrello</button>
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
                    @else
                        <h3>Non ci sono prodotti da visualizzare</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>
