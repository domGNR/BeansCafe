{{-- {{dd($product->photos)}} --}}

<x-layouts.dashboard>
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form enctype="multipart/form-data" method="POST"
                        action="{{ route('dashboard.products.update', $product->id) }}">
                        @csrf
                        <div class="form-group">
                            <label for="id" style="text-transform:capitalize">id</label>
                            <input type="text" class="form-control" name="id"
                                value="{{ $product->id }}"disabled>
                            @error('id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name" style="text-transform:capitalize">name</label>
                            <input type="text" class="form-control" name="name" value="{{ $product->name }}">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="slug" style="text-transform:capitalize">slug</label>
                            <input type="text" class="form-control" name="slug" value="{{ $product->slug }}">
                            @error('slug')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description" style="text-transform:capitalize">description</label>
                            <input type="text" class="form-control" name="description"
                                value="{{ $product->description }}">
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price" style="text-transform:capitalize">prezzo</label>
                            <input type="number" class="form-control" name="price" min="0.00" max="10000.00"
                                step="0.01" value="{{ $product->price }}" />
                            @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="stock_qty" style="text-transform:capitalize">stock</label>
                            <input type="number" class="form-control" name="stock_qty" min="0" max="10000"
                                step="1" value="{{ $product->stock_qty }}" />
                            @error('stock_qty')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="cover_image" style="text-transform:capitalize">cover_image</label>
                            <input type="file" id="input-file-now-custom-3" class="form-control m-2"
                                name="cover_image">
                            @error('cover_image')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="images" style="text-transform:capitalize">images</label>
                            <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="images[]"
                                multiple>
                            @error('images')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button class="btn btn-primary m-3 d-block">Aggiorna</button>
                    </form>
                    <form action="{{ route('dashboard.products.destroy', $product) }}" enctype="multipart/form-data"
                        method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger my-5 d-block">Elimina</button>
                    </form>

                    @isset($product->cover)
                        <div class="form-group">
                            <label for="cover_photo" class="d-block" style="text-transform:capitalize">cover
                                foto</label>
                            <div class="d-block">
                                <img name="cover_photo"
                                    src="{{ asset('assets/store/images/products/' . $product->cover) }}" alt=""
                                    class="" height="300">
                                <form action="{{ route('dashboard.cover.destroy', $product) }}" method="POST">
                                    @csrf
                                    <button type='submit'>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path
                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                            <path
                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endisset

                    @if (count($product->photos) > 0)
                        <div>
                            <label for="gallery_photo" class="d-block" style="text-transform:capitalize">gallery
                                foto</label>
                            <div class="row">
                                <div class="col-12 m-5">
                                    <div class="owl-carousel owl-theme">
                                        @foreach ($product->photos as $photo)
                                        <div class="item">
                                                <img src="{{ asset('assets/store/images/products/' . $photo->url) }}" alt="">
                                                <form action="{{ route('dashboard.photos.destroy', $photo) }}"
                                                    enctype="multipart/form-data" method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <button type='submit'>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-trash"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                                            <path
                                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                            @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layouts.dashboard>
<script>
    $('.owl-carousel').owlCarousel({
        loop: false,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    })
</script>
