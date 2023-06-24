<x-layouts.dashboard>
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form enctype="multipart/form-data" method="POST" action="{{ route('dashboard.products.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name" style="text-transform:capitalize">nome</label>
                            <input type="text" class="form-control" name="name">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="slug" style="text-transform:capitalize">slug</label>
                            <input type="text" class="form-control" name="slug">
                            @error('slug')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description" style="text-transform:capitalize">descrizione</label>
                            <input type="text" class="form-control" name="description">
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category_id" style="text-transform:capitalize">categoria</label>
                            <select name="category_id" class="form-control">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"> {{ $category->name }} </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="brand_id" style="text-transform:capitalize">brand</label>
                            <select name="brand_id" class="form-control">
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}"> {{ $brand->name }} </option>
                                @endforeach
                            </select>
                            @error('brand_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price" style="text-transform:capitalize">prezzo</label>
                            <input type="number" class="form-control" name="price" min="0.00" max="10000.00"
                                step="0.01" />
                            @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="stock_qty" style="text-transform:capitalize">stock</label>
                            <input type="number" class="form-control" name="stock_qty" min="0" max="10000"
                                step="1" />
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
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="activeSwitch" name="active"
                                    checked>
                                <label class="custom-control-label" for="activeSwitch">Mostra prodotto nello
                                    shop</label>
                            </div>
                        </div>
                        <button class="btn btn-primary mb-3 d-block">Aggiungi</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="container-fluid m-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Prodotti</h4>
                            {{-- <p class="product">Here is a subtitle for this table</p> --}}
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>Id</th>
                                    <th>Nome</th>
                                    <th>Descrizione</th>
                                    <th>Quantità</th>
                                    <th>Prezzo</th>
                                    <th>Foto Cover</th>
                                    <th>Attivo ?</th>
                                    <th>Brand</th>
                                    <th>Categoria</th>
                                    <th>Creato</th>
                                    <th>Aggiornato</th>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr class="clickable-row"
                                            data-href="{{ route('dashboard.products.edit', $product->id) }}">
                                            <td>{{ $product->id }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->description }}</td>
                                            <td>{{ $product->stock_qty }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->cover }}</td>
                                            <td>{{ $product->is_show == 1 ? 'SI' : 'NO' }}</td>
                                            @foreach ($brands as $brand)
                                                @if ($brand->id == $product->brand_id)
                                                    <th>{{ $brand->name }}</th>
                                                @endif
                                            @endforeach
                                            @foreach ($categories as $category)
                                                @if ($category->id == $product->category_id)
                                                    <th>{{ $category->name }}</th>
                                                @endif
                                            @endforeach
                                            <td>{{ $product->created_at }}</td>
                                            <td>{{ $product->updated_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.dashboard>
