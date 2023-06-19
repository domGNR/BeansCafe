{{-- {{dd($product->photos)}} --}}

<x-layouts.dashboard>
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form enctype="multipart/form-data" method="POST"
                        action="{{ route('dashboard.categories.update', $product->id) }}">
                        @csrf
                        <div class="form-group">
                            <label for="id" style="text-transform:capitalize">id</label>
                            <input type="text" class="form-control" name="id"
                                value="{{ $product->id }} disabled0">
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
                            <input type="text" class="form-control" name="name"
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
                            <label for="cover_photo" class="d-block" style="text-transform:capitalize">cover
                                foto</label>
                            <div class="d-block"><img name="cover_photo"
                                    src="{{ asset('assets/store/images/products/' . $product->cover) }}" alt=""
                                    class="" height="300"></div>
                        </div>
                        <div>
                            <label for="cover_photo" class="d-block" style="text-transform:capitalize">gallery
                                foto</label>
                            <div class="row">
                                @foreach ($product->photos as $photo)
                                <div class="col m-5">
                                    <img name="cover_photo" class="m-5"
                                    src="{{ asset('assets/store/images/products/' . $photo->url) }}" alt="" height="300">
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <button class="btn btn-primary m-3 d-block">Aggiorna</button>
                    </form>
                    <form action="{{ route('dashboard.categories.destroy', $product) }}" enctype="multipart/form-data"
                        method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger my-5 d-block">Elimina</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.dashboard>
