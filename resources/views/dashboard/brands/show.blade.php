<x-layouts.dashboard>
    <div class="container-fluid">
        <div class="container-fluid">
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
