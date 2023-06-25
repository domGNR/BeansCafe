<body>
    Conferma ordine : 

    <h4>Riepilogo prodotti:</h4>
    <table>
        <thead>
            <th>Descrizione</th>
            <th>Quantità</th>
            <th>Prezzo</th>
        </thead>
        @foreach ($data['products'] as $product)
        <tr>
            <td>{{$product->description}}</td>
            <td>{{$product->stock_qty}}</td>
            <td>{{$product->price}}</td>
        </tr>
        @endforeach
    </table>

    <h4>Totale:</h4><span>  {{$data['order']->total}}</span>
</body>