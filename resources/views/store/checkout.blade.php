<x-layouts.app>
    <section class="home-slider owl-carousel">

        <div class="slider-item" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">Checkout</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span>
                            <span>Checkout</span>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 ftco-animate" id="checkoutWrapper">
                    <form action="{{ route('order.store') }}" method="POST"
                        class="billing-form ftco-bg-dark p-3 p-md-5" id="checkoutForm">
                        @csrf
                        <h3 class="mb-4 billing-heading">Dettagli pagamento</h3>
                        <div class="row align-items-end">
                            <input type="hidden" name="cartData" id="cartData" value="">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" style="text-transform:capitalize">Nome</label>
                                    <input type="text" class="form-control" name="name">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="surname" style="text-transform:capitalize">Cognome</label>
                                    <input type="text" class="form-control" name="surname">
                                    @error('surname')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Indirizzo</label>
                                    <input type="text" class="form-control" placeholder="Via e numero civico"
                                        name="address">
                                    @error('address')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="city">Città</label>
                                    <input type="text" class="form-control" name="city">
                                    @error('city')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="zip">Cap</label>
                                    <input type="text" class="form-control" name="zip">
                                    @error('zip')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="w-100"></div>
                        </div>
                        <div class="row mt-5 pt-3 d-flex">
                            <div class="col-md-6 d-flex">
                                <div class="cart-detail cart-total ftco-bg-dark p-3 p-md-4">
                                    <h3 class="billing-heading mb-4">Totale carrello</h3>
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

                            </div>
                            <div class="col-md-6">
                                <div class="cart-detail ftco-bg-dark p-3 p-md-4">
                                    <h3 class="billing-heading mb-4">Metodo pagamento</h3>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="radio">
                                                <label><input type="radio" value="credit" name="payment" checked
                                                        class="mr-2">Carta di
                                                    credito</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="radio">
                                                <label><input type="radio" value="paypal" name="payment"
                                                        class="mr-2">
                                                    Paypal</label>
                                            </div>
                                        </div>
                                    </div>
                    </form><!-- END -->
                    <button type="submit" id="checkout" class="btn btn-primary py-3 px-4">Prosegui
                        e
                        paga</button>
                </div>
            </div>
        </div>
        </div> <!-- .col-md-8 -->
        <div class="col-xl-12 ftco-animate" id="emptyWrapper">
            <h3>Non ci sono prodotti nel carrello</h3>
        </div>

        </div>
        </div>
    </section>
    <script>
        updateCheckout = () => {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            localStorage.setItem('checkout', JSON.stringify(cart));


            const subtotalEl = document.querySelector("#subtotal")
            const deliveryEl = document.querySelector("#delivery")
            const totalEl = document.querySelector("#total")

            const cartData = document.querySelector('#cartData')
            cartData.value = localStorage.getItem('checkout');
            const subtotal = cart.map(el => el.qty * el.price).reduce((t, n) => {
                return t + n
            }, 0)
            const delivery = subtotal > 49.99 ? 'Spedizione gratuita' : 9.99
            const total = subtotal > 49.99 ? subtotal : subtotal + delivery
            subtotalEl.innerText = subtotal ? '€ ' + subtotal.toFixed(2) : ""
            deliveryEl.innerText = subtotal ? subtotal > 49.99 ? 'Spedizione gratuita' : '€ ' + delivery.toFixed(2) : ""
            totalEl.innerText = subtotal ? '€ ' + total.toFixed(2) : ""
        }

        updateCheckout()


        const checkout = JSON.parse(localStorage.getItem('checkout')) || [];
        const checkoutWrapper = document.querySelector("#checkoutWrapper")
        const emptyWrapper = document.querySelector("#emptyWrapper")
        if (checkout.length === 0) {
            checkoutWrapper.remove()
        }
        if (checkout.length > 0) {
            emptyWrapper.remove()
        }
    </script>
</x-layouts.app>
