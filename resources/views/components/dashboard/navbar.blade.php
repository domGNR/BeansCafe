<nav class="navbar navbar-default navbar-fixed">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">Dashboard</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-left">
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ route('store.home') }}">Vai allo shop</a></li>
                <li class="separator hidden-lg"></li>
                <li>
                    <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();localStorage.setItem('cart', '[]');
                                       document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                </li>

            </ul>
        </div>
    </div>
</nav>