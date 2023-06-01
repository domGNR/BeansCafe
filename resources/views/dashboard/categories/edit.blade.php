<x-layouts.dashboard>
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form enctype="multipart/form-data" method="POST" action="{{route('dashboard.categories.update', $category->id)}}">
                        @csrf
                        <div class="form-group">
                            <label for="name" style="text-transform:capitalize">name</label>
                            <input type="text" class="form-control" name="name" value="{{ $category->name }}">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button class="btn btn-primary m-3 d-block">Aggiorna</button>
                    </form>
                    <form action="{{route('dashboard.categories.destroy', $category)}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger my-5 d-block">Elimina</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.dashboard>
