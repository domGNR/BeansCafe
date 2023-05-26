<x-layouts.dashboard>
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form enctype="multipart/form-data" method="POST" action="{{route('dashboard.brands.update', $brand->id)}}">
                        @csrf
                        <div class="form-group">
                            <label for="name" style="text-transform:capitalize">name</label>
                            <input type="text" class="form-control" name="name" value="{{ $brand->name }}">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button class="btn btn-primary m-3 d-block">Aggiorna</button>
                    </form>
                    <form action="{{route('dashboard.brands.destroy', $brand)}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger my-5 d-block">Elimina</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.dashboard>
