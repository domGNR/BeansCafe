<div class="sidebar" data-color="blue">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="{{route("dashboard.orders.index")}}" class="simple-text">
                    BeansCafe
                </a>
            </div>

            <ul class="nav">
                <li class={{ Request::is('dashboard/users') ? 'active' : '' }}>
                    <a href="{{route("dashboard.users.index")}}">
                        {{-- <i class="pe-7s-graph"></i> --}}
                        <p>Users</p>
                    </a>
                </li>
                <li class={{ Request::is('dashboard/orders') ? 'active' : '' }}>
                    <a href="{{route("dashboard.orders.index")}}">
                        {{-- <i class="pe-7s-user"></i> --}}
                        <p>Orders</p>
                    </a>
                </li>
                <li class={{ Request::is('dashboard/products') ? 'active' : '' }}>
                    <a href="{{route("dashboard.products.index")}}">
                        {{-- <i class="pe-7s-note2"></i> --}}
                        <p>Products</p>
                    </a>
                </li>
                <li class={{ Request::is('dashboard/brands') ? 'active' : '' }}>
                    <a href="{{route("dashboard.brands.index")}}">
                        {{-- <i class="pe-7s-news-paper"></i> --}}
                        <p>Brands</p>
                    </a>
                </li>
                <li class={{ Request::is('dashboard/categories') ? 'active' : '' }}>
                    <a href="{{route("dashboard.categories.index")}}">
                        {{-- <i class="pe-7s-science"></i> --}}
                        <p>Categories</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>
