<x-layouts.dashboard>
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 py-5 my-5">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Prodotti</h4>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Nome</th>
                                        <th>Descrizione</th>
                                        <th>Quantità</th>
                                        <th>Prezzo</th>
                                        <th>Totale</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->products as $product)
                                            <tr data-href="{{ route('order.edit', $order->id) }}">
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->description }}</td>
                                                <td>{{ $product->pivot->qty }}</td>
                                                <td>€ {{ $product->price }}</td>
                                                <td>€ {{ $product->price * $product->pivot->qty }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>Totale</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>€ {{ $order->total }}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <form enctype="multipart/form-data" method="POST" action="{{ route('dashboard.orders.update', $order->id) }}">
                        @csrf
                        <div class="form-group">
                            <label for="name" style="text-transform:capitalize">nome</label>
                            <input type="text" class="form-control" name="name" value="{{ $order->name }}">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="surname" style="text-transform:capitalize">cognome</label>
                            <input type="text" class="form-control" name="surname" value="{{ $order->surname }}">
                            @error('surname')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address" style="text-transform:capitalize">indirizzo</label>
                            <input type="text" class="form-control" name="address" value="{{ $order->address }}">
                            @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="city" style="text-transform:capitalize">città</label>
                            <input type="text" class="form-control" name="city" value="{{ $order->city }}">
                            @error('city')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="zip" style="text-transform:capitalize">cap</label>
                            <input type="text" class="form-control" name="zip" value="{{ $order->zip }}">
                            @error('zip')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tracking" style="text-transform:capitalize">tracking</label>
                            <input type="text" class="form-control" name="tracking" value="{{ $order->tracking }}">
                            @error('tracking')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status_id" style="text-transform:capitalize">Stato ordine</label>
                            <select class="form-control" name="status_id" value="{{ $order->status_id }}">
                                @foreach ($orderStatuses as $orderStatus)
                                    <option value={{ $orderStatus->id }}
                                        {{ $order->status_id == $orderStatus->id ? 'selected' : '' }}>
                                        {{ $orderStatus->name }}</option>
                                @endforeach
                            </select>
                            @error('status_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button class="btn btn-primary m-3 d-block {{$order->status_id==5 ? 'not-allowed disabled' : 'clickable-row'}}">Aggiorna</button>
                    </form>
                    <form action="{{route('dashboard.orders.cancel', $order)}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <button class="btn btn-danger my-5 d-block {{$order->status_id==5 ? 'not-allowed disabled' : 'clickable-row'}}">Annulla ordine</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.dashboard>
