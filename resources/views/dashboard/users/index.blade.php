<x-layouts.dashboard>
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if (count($users)>0)
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Utenti</h4>
                            {{-- <p class="category">Here is a subtitle for this table</p> --}}
                        </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Id</th>
                                        <th>Nome e cognome</th>
                                        <th>email</th>
                                        <th>Ruolo</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                        <tr class="clickable-row"
                                        data-href="{{route('dashboard.users.edit',$user['id'])}}">
                                            {{-- {{dd($user)}} --}}
                                                <td>{{$user['id']}}</td>
                                                <td>{{$user['full_name']}}</td>
                                                <td>{{$user['email']}}</td>
                                                <td>{{$user['role_id']}}</td>
                                            @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="content table-responsive table-full-width" style="height: 78vh">
                        <h3>Nessun utente presente</h3>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-layouts.dashboard>
