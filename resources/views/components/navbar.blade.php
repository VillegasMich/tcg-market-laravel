<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home.index') }}">TCG Market</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#">Packs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Cards</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('order.index') }}">Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">Users</a>
                </li>
            </ul>
            <div class="d-flex navbar-nav mb-2 mb-lg-0 justify-content-end">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <div class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </div>
                    @endif

                    @if (Route::has('register'))
                        <div class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </div>
                    @endif
                @else
                    <form id="logout" action="{{ route('logout') }}" method="POST">
                        <a role="button" class="nav-link active"
                            onclick="document.getElementById('logout').submit();">Logout</a>
                        @csrf
                    </form>
                @endguest
            </div>
        </div>
    </div>
</nav>
