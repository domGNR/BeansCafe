<x-layouts.app>
    <div class="container my-5 py-5" >
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header bg-dark">
                        <h4 class="title">I miei Ordini</h4>
                    </div>
                    <div class="content table-responsive table-full-width bg-dark">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>Cognome</th>
                                <th>Indirizzo</th>
                                <th>Città</th>
                                <th>Cap</th>
                                <th>Stato Ordine</th>
                                <th>Tracking</th>
                                <th>Totale</th>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr class="clickable-row" style="cursor:pointer" data-href="{{ route('order.edit', $order->id) }}">
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->name }}</td>
                                        <td>{{ $order->surname }}</td>
                                        <td>{{ $order->address }}</td>
                                        <td>{{ $order->city }}</td>
                                        <td>{{ $order->zip }}</td>
                                        @foreach ($orderStatuses as $orderStatus)
                                        @if ($order->status_id == $orderStatus->id)
                                            <td>{{ $orderStatus->name }}</td>
                                        @endif
                                        @endforeach
                                        <td>{{ $order->tracking }}</td>
                                        <td>€ {{ $order->total }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
<script>
    $(document).ready(function() {
        $(".clickable-row").click(function() {
            window.location = $(this).data("href");
        });
    });
</script>
