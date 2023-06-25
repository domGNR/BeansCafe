<x-layouts.app>
    <div class="container my-5 py-5">
        <div class="row my-5 py-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="header bg-dark">
                        <h4 class="title">Ordine N. {{$order->id}}</h4>
                    </div>
                    <div class="content table-responsive table-full-width bg-dark">
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
                                    <td>€ {{$order->total}}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
