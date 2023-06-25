<x-layouts.app>
    <section class="home-slider owl-carousel">
        <div class="slider-item" style="background-image:url({{ asset('assets/store/images/bg_1.jpg') }});">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                    <div class="col-md-8 col-sm-12 text-center ftco-animate">
                        <span class="subheading">…e all’ottavo giorno, Dio creò il caffè.</span>
                        <h1 class="mb-4">Beans Cafe</h1>
                        {{-- <p class="mb-4 mb-md-5">A small river named Duden flows by their place and supplies it with the
                            necessary regelialia.</p> --}}
                        <p>
                            <a href="{{route('store.shop')}}" class="btn btn-primary p-3 px-xl-4 py-xl-3">Acquista</a> 
                            <a href="#our-story" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">La nostra storia</a>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="ftco-intro m-1">
        <div class="container-wrap">
            <div class="wrap d-md-flex align-items-xl-end">
                <div class="info w-100">
                    <div class="row no-gutters">
                        <div class="col-md-4 d-flex ftco-animate">
                            <div class="icon"><span class="icon-phone"></span></div>
                            <div class="text">
                                <h3>800 700 600</h3>
                                <p>Chiamaci per assistenza</p>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex ftco-animate">
                            <div class="icon"><span class="icon-my_location"></span></div>
                            <div class="text">
                                <h3>Via Edoardo Orabona, 4 </h3>
                                <p>Bari BA, Italia</p>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex ftco-animate">
                            <div class="icon"><span class="icon-clock-o"></span></div>
                            <div class="text">
                                <h3>Consegne dal lunedi al Venerdi</h3>
                                <p>8:00 - 15:00pm</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-about d-md-flex" id="our-story">
        <div class="one-half img" style="background-image:url({{ asset('assets/store/images/coffee-shop.jpg') }})"></div>
        <div class="one-half ftco-animate">
            <div class="overlap">
                <div class="heading-section ftco-animate ">
                    <span class="subheading">Scopri</span>
                    <h2 class="mb-4">La nostra storia</h2>
                </div>
                <div>
                    <p>
                        Benvenuti a BeansCafe, il negozio di caffè di Bari che esplora le delizie globali. Da oltre 50 anni, siamo un punto di riferimento nella nostra città, offrendo una vasta selezione di caffè provenienti da tutto il mondo. Abbiamo viaggiato per scoprire le migliori varietà di chicchi e abbiamo fondato il nostro marchio unico, BeansCafe. Ora, con il lancio del nostro negozio online, puoi goderti il nostro caffè eccezionale comodamente a casa tua. Dai una sbirciata alle nostre miscele speciali, tostate fresche e confezionate con cura. Siamo entusiasti di condividere la passione per il caffè con una comunità globale ancora più ampia. Benvenuti nel nostro negozio online BeansCafe, dove l'amore per il caffè di Bari incontra l'aroma del mondo.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-services">
        <div class="container">
            <div class="row">
                <div class="col-md-4 ftco-animate">
                    <div class="media d-block text-center block-6 services">
                        <div class="icon d-flex justify-content-center align-items-center mb-5">
                            <span class="flaticon-choices"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Ordini facili</h3>
                            <p>
                                Con pochi clic nel nostro negozio online, hai accesso a una varietà di prodotti di alta qualità, pronti per essere consegnati direttamente a casa tua.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ftco-animate">
                    <div class="media d-block text-center block-6 services">
                        <div class="icon d-flex justify-content-center align-items-center mb-5">
                            <span class="flaticon-delivery-truck"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Consegna rapida</h3>
                            <p>I tuoi prodotti arriveranno tempestivamente, garantendo un'esperienza di acquisto senza attese.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ftco-animate">
                    <div class="media d-block text-center block-6 services">
                        <div class="icon d-flex justify-content-center align-items-center mb-5">
                            <span class="flaticon-coffee-bean"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Qualità caffè</h3>
                            <p>Il caffè di qualità superiore. I nostri chicchi accuratamente selezionati e tostati offrono un gusto ricco e una deliziosa esperienza di caffè..</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @isset($products)
    @if (count($products) > 0)
    <section class="ftco-menu">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">Scopri</span>
                    <h2 class="mb-4">I nostri prodotti</h2>
                    {{-- <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                        live the blind texts.</p> --}}
                </div>
            </div>
            <div class="row d-md-flex">
                <div class="col-lg-12 ftco-animate p-md-5" id="contentSection">
                    <div class="alert alert-success alert-dismissible fade" role="alert" id="alertBox"></div>
                    <div class="row">
                        <div class="col-md-12 nav-link-wrap mb-5">
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
                                                            <a class="img" href="{{ route('store.shop.single', $product) }}"
                                                                style="background-image: url({{($product->cover ? asset('assets/store/images/products/' . $product->cover) : asset('assets/store/images/placeholder.jpg'))}})"></a>
                                                            <div class="text text-center pt-4">
                                                                <h3><a href="{{ route('store.shop.single', $product) }}">{{ $product->name }}</a></h3>
                                                                <p>{{ $product->description }}</p>
                                                                <p class="price"><span>€ {{ $product->price }}</span>
                                                                </p>
                                                                <button
                                                                    onClick="addToCart((createItem( {{ $product->id }} , '{{$product->name}}', {{ $product->price }} , 1 )))"
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
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
        @endisset
</x-layouts.app>
