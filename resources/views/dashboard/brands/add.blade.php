<x-layouts.dashboard>
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form enctype="multipart/form-data" method="POST" action="{{route('dashboard.brands.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="name" style="text-transform:capitalize">name</label>
                            <input type="text" class="form-control" name="name">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button class="btn btn-primary m-3 d-block">Aggiungi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.dashboard>
