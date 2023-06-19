<x-layouts.app>
    <style>
        .ftco-cart button{
            border:0 !important;
            cursor:pointer;
        }
    </style>
    <section class="home-slider owl-carousel">
        <div class="slider-item" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">Cart</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span>
                            <span>Cart</span></p>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section ftco-cart" id="cartSection">
        <div class="container" id="#contentSection">
            <div class="alert alert-success alert-dismissible fade" role="alert" id="alertBox"></div>
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list" style="overflow-x: auto !important;">
                        <table class="table">
                            <thead class="thead-primary">
                                <tr class="text-center">
                                    {{-- <th>&nbsp;</th> --}}
                                    <th>&nbsp;</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody id="cartTable">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Totale carrello</h3>
                        <p class="d-flex">
                            <span>Subtotale</span>
                            <span id="subtotal"></span>
                        </p>
                        <p class="d-flex">
                            <span>Spedizione</span>
                            <span id="delivery"></span>
                        </p>
                        <hr>
                        <p class="d-flex total-price">
                            <span>Totale</span>
                            <span id="total"></span>
                        </p>
                    </div>
                    <p class="text-center"><a href="{{route('store.cart.checkout')}}" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-cart d-none" id="emptyCartSection">
      <div class="container">
        <div class="row">
          <div class="col-md-12 ftco-animate">
            <h3>Non ci sono prodotti nel carrello</h3>
          </div>
        </div>
      </div>
    </section>
</x-layouts.app>
