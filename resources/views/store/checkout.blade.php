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
                <div class="col-xl-12 ftco-animate">
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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="state" style="text-transform:capitalize">Stato (al momento si
                                        effettuano solo spedizioni in territorio italiano)</label>
                                    <input type="text" class="form-control" name="state" value="italia" disabled>
                                    @error('state')
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
                                    <label for="cap">Cap</label>
                                    <input type="text" class="form-control" name="cap">
                                    @error('cap')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-100"></div>
                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                            </div> --}}
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
                                <button onClick="updateCheckout()" class="my-2 btn btn-primary py-3 px-4">Aggiorna
                                    carrello</button>
                            </div>
                            
                        </div>
                        <div class="col-md-6">
                            <div class="cart-detail ftco-bg-dark p-3 p-md-4">
                                <h3 class="billing-heading mb-4">Metodo pagamento</h3>
                                {{-- <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="radio">
                                            <label><input type="radio" name="optradio" class="mr-2">Bonifico bancario</label>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="radio">
                                            <label><input type="radio" value="credit" name="payment" checked class="mr-2">Carta di
                                                credito</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="radio">
                                            <label><input type="radio" value="paypal" name="payment" class="mr-2">
                                                Paypal</label>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="" class="mr-2"> I have read
                                                and accept the terms and conditions</label>
                                        </div>
                                    </div>
                                </div> --}}
                            </form><!-- END -->
                                <button type="submit" id="checkout" class="btn btn-primary py-3 px-4">Prosegui
                                    e
                                    paga</button>
                            </div>
                        </div>
                    </div>
                </div> <!-- .col-md-8 -->




                {{-- <div class="col-xl-4 sidebar ftco-animate">
              <div class="sidebar-box">
                <form action="#" class="search-form">
                  <div class="form-group">
                      <div class="icon">
                        <span class="icon-search"></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Search...">
                  </div>
                </form>
              </div>
              <div class="sidebar-box ftco-animate">
                <div class="categories">
                  <h3>Categories</h3>
                  <li><a href="#">Tour <span>(12)</span></a></li>
                  <li><a href="#">Hotel <span>(22)</span></a></li>
                  <li><a href="#">Coffee <span>(37)</span></a></li>
                  <li><a href="#">Drinks <span>(42)</span></a></li>
                  <li><a href="#">Foods <span>(14)</span></a></li>
                  <li><a href="#">Travel <span>(140)</span></a></li>
                </div>
              </div>

              <div class="sidebar-box ftco-animate">
                <h3>Recent Blog</h3>
                <div class="block-21 mb-4 d-flex">
                  <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
                  <div class="text">
                    <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                    <div class="meta">
                      <div><a href="#"><span class="icon-calendar"></span> July 12, 2018</a></div>
                      <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                      <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                    </div>
                  </div>
                </div>
                <div class="block-21 mb-4 d-flex">
                  <a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
                  <div class="text">
                    <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                    <div class="meta">
                      <div><a href="#"><span class="icon-calendar"></span> July 12, 2018</a></div>
                      <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                      <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                    </div>
                  </div>
                </div>
                <div class="block-21 mb-4 d-flex">
                  <a class="blog-img mr-4" style="background-image: url(images/image_3.jpg);"></a>
                  <div class="text">
                    <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                    <div class="meta">
                      <div><a href="#"><span class="icon-calendar"></span> July 12, 2018</a></div>
                      <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                      <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="sidebar-box ftco-animate">
                <h3>Tag Cloud</h3>
                <div class="tagcloud">
                  <a href="#" class="tag-cloud-link">dish</a>
                  <a href="#" class="tag-cloud-link">menu</a>
                  <a href="#" class="tag-cloud-link">food</a>
                  <a href="#" class="tag-cloud-link">sweet</a>
                  <a href="#" class="tag-cloud-link">tasty</a>
                  <a href="#" class="tag-cloud-link">delicious</a>
                  <a href="#" class="tag-cloud-link">desserts</a>
                  <a href="#" class="tag-cloud-link">drinks</a>
                </div>
              </div>

              <div class="sidebar-box ftco-animate">
                <h3>Paragraph</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
              </div>
            </div> --}}

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
            cartData.value = cart;
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


        checkIfEmpty = (event) => {
            const cart = JSON.parse(localStorage.getItem('checkout')) || [];
            if (cart.length === 0) {
                event.preventDefault();
                alert('Il tuo carrello è vuoto')
            } else {
                const form = document.querySelector("#checkoutForm")
                form.submit()
            }
        }

        const checkoutButton = document.querySelector("#checkout")
        checkoutButton.addEventListener('click', (event) => {
            checkIfEmpty(event)
        })
    </script>
</x-layouts.app>
