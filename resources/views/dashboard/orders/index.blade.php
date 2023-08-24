<x-layouts.dashboard>
    <style>.not-allowed{
        cursor: not-allowed;
    }</style>
    <div class="container-fluid">
        <div class="container-fluid m-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Ordini</h4>
                            {{-- <p class="category">Here is a subtitle for this table</p> --}}
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                        <th>Id</th>
                                        <th>Nome</th>
                                        <th>Cognome</th>
                                        <th>Città</th>
                                        <th>Indirizzo</th>
                                        <th>Cap</th>
                                        <th>Totale</th>
                                        <th>Stato Ordine</th>
                                        <th>Tracking</th>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)

                                        <tr class="{{$order->status_id==5 ? 'not-allowed disabled' : 'clickable-row'}}"
                                            data-href="{{ route('dashboard.orders.edit', $order->id) }}">
                                            <td>{{$order->id}}</td>
                                            <td>{{$order->name}}</td>
                                            <td>{{$order->surname}}</td>
                                            <td>{{$order->city}}</td>
                                            <td>{{$order->address}}</td>
                                            <td>{{$order->zip}}</td>
                                            <td>€ {{$order->total}}</td>                                            
                                            @foreach ($orderStatuses as  $orderStatus)
                                                @if ($orderStatus->id == $order->status_id)
                                                    <th>{{$orderStatus->name}}</th>
                                                @endif
                                            @endforeach
                                            <td>{{$order->tracking}}</td>
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
