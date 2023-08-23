<x-layouts.dashboard>
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    {{-- {{dd($user)}} --}}
                    {{-- <form enctype="multipart/form-data" method="POST" action="{{route('post.update', $post)}}" --}}
                    <form enctype="multipart/form-data" method="POST" action="{{route('dashboard.users.update', $user['id'])}}">
                        @csrf
                        <div class="form-group">
                            <label for="id" style="text-transform:capitalize">id</label>
                            <input type="text" class="form-control" name="id" value="{{ $user['id'] }}"
                                disabled>
                            @error('id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email" style="text-transform:capitalize">email</label>
                            <input type="text" class="form-control" name="email" value="{{ $user['email'] }}"
                                disabled>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name" style="text-transform:capitalize">Nome e cognome</label>
                            <input type="text" class="form-control" name="name" value="{{ $user['name'] }}">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="role_id" style="text-transform:capitalize">Ruolo</label>
                            <select class="form-control" name="role_id" value="{{ $user['role_id'] }}">
                                @foreach ($roles as $role)
                                    <option value={{$role->id}} {{$role->id == $user['role_id'] ? 'selected' : ''}}>{{$role->name}}</option>
                                @endforeach
                            </select>
                            @error('role_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button class="btn btn-primary m-3 d-block">Aggiorna</button>
                    </form>
                    {{-- <form action="{{route('dashboard.users.update', $user)}}" enctype="multipart/form-data" method="POST">
                        <button class="btn btn-danger my-5 d-block">Elimina</button>
                    </form> --}}
                </div>
            </div>
        </div>
    </div>
</x-layouts.dashboard>
