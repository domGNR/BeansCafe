<x-layouts.app>
    <style>
        #productSlider .item img {
            display: block;
            width: auto;
            height: auto;
            max-height:350px;
        }
    </style>
    <section class="home-slider owl-carousel">

        <div class="slider-item" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">Dettagli prodotto</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Detttagli prodotto</span></p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container" id="contentSection">
            <div class="alert alert-success alert-dismissible fade" role="alert" id="alertBox"></div>
            <div class="row">
                <div class="col-lg-6 mb-5 ftco-animate">
                    <div id="productSlider" class="owl-carousel owl-theme">
                        <div class="item">
                            <img src="{{ $product->cover ? asset('assets/store/images/products/' . $product->cover) : asset('assets/store/images/placeholder.jpg') }}"
                                alt="{{ $product->name }}">
                        </div>
                        @if (count($product->photos) > 0)
                            @foreach ($product->photos as $photo)
                                    <div class="item">
                                        <img src="{{ asset('assets/store/images/products/' . $photo->url) }}"
                                            alt="{{ $product->name }}">
                                    </div>
                            @endforeach
                        @endif
                    </div>


                </div>
                <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                    <h3>{{ $product->name }}</h3>
                    <p class="price"><span>€ {{ $product->price }}</span></p>
                    <p>{{ $product->description }}</p>
                    <div class="row mt-4">
                        {{-- <div class="col-md-6">
                            <div class="form-group d-flex">
                                <div class="select-wrap">
                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                    <select name="" id="" class="form-control">
                                        <option value="">Small</option>
                                        <option value="">Medium</option>
                                        <option value="">Large</option>
                                        <option value="">Extra Large</option>
                                    </select>
                                </div>
                            </div>
                        </div> --}}
                        <div class="w-100"></div>
                        <div class="input-group col-md-6 d-flex mb-3">
                            <span class="input-group-btn mr-2">
                                <button type="button" class="quantity-left-minus btn" onClick="removeInput()">
                                    <i class="icon-minus"></i>
                                </button>
                            </span>
                            <input type="text" id="quantity" name="quantity" class="form-control input-number"
                                value="1" min="1" max="100">
                            <span class="input-group-btn ml-2">
                                <button type="button" class="quantity-right-plus btn" onClick="addInput()">
                                    <i class="icon-plus"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                    <p><a class="btn btn-primary text-white py-3 px-5" id="addToCartButton">Aggiungi al carrello</a></p>
                </div>
            </div>
        </div>
    </section>

</x-layouts.app>
<script>
    const product = {!! json_encode($product) !!};
    addInput = () => {
        const el = document.querySelector("#quantity")
        el.value = (parseInt(el.value) + 1).toString()
    }

    removeInput = () => {
        const el = document.querySelector("#quantity")
        el.value = el.value === '1' ? '1' : (parseInt(el.value) - 1).toString()
    }

    addSingleProductToCart = () => {
        const el = document.querySelector("#quantity")
        addToCart(createItem(product.id, product.name, product.price, parseInt(el.value)))
    }

    const addToCartButton = document.querySelector("#addToCartButton")
    addToCartButton.addEventListener('click', addSingleProductToCart);

    $(document).ready(function() {

        $("#productSlider").owlCarousel({

            navigation: true, // Show next and prev buttons

            slideSpeed: 100,
            paginationSpeed: 400,

            items: 1,
            itemsDesktop: false,
            itemsDesktopSmall: false,
            itemsTablet: false,
            itemsMobile: false

        });

    });
</script>
