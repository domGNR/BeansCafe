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
                        <div class="form-group">
                            <label for="slug" style="text-transform:capitalize">slug</label>
                            <input type="text" class="form-control" name="slug">
                            @error('slug')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button class="btn btn-primary mb-3 d-block">Aggiungi</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="container-fluid m-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Brand</h4>
                            {{-- <p class="category">Here is a subtitle for this table</p> --}}
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                    @foreach (Schema::getColumnListing('brands') as $key)
                                        <th>{{ $key }}</th>
                                    @endforeach
                                </thead>
                                <tbody>
                                    @foreach ($brands as $brand)
                                        <tr class="clickable-row"
                                            data-href="{{ route('dashboard.brands.edit', $brand->id) }}">
                                            @foreach ($brand as $value)
                                                <td>{{ $value }}</td>
                                            @endforeach
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
