<x-layouts.dashboard>
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Utenti</h4>
                            {{-- <p class="category">Here is a subtitle for this table</p> --}}
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                    @foreach ($users[0] as $key => $value)
                                    <th>{{$key}}</th>
                                    @endforeach
                                    <th>Edit</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($users as $user)
                                            @foreach ($user as $value)
                                                <td>{{$value}}</td>
                                            @endforeach
                                            {{-- {{dd($user)}} --}}
                                            <td><button><a href="{{route('dashboard.users.edit',$user['id'])}}">Edit</a></button></td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.dashboard>
