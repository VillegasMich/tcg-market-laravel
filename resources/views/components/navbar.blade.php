<nav class="w-full h-fit flex font-medium shadow-sm">
  <a class="text-2xl w-1/6 flex justify-center items-center" href="{{ route('home.index') }}">TCG Market</a>
  <div class="w-11/12 flex justify-between items-center h-12" id="navbarSupportedContent">
    <ul class="flex space-x-6 text-lg">
      <li class="h-12 flex justify-center items-center">
        <x-navbar-link href="{{ route('tcgCard.index') }}" :active="request()->is('tcgcards')">Cards</x-navbar-link>
      </li>
      <li class="h-12 flex justify-center items-center">
        <x-navbar-link href="{{ route('tcgPack.index') }}" :active="request()->is('tcgpacks')">Packs</x-navbar-link>
      </li>
      <li class="h-12 flex justify-center items-center">
        <x-navbar-link href="{{ route('order.index') }}" :active="request()->is('orders')">Orders</x-navbar-link>
      </li>
      <li class="h-12 flex justify-center items-center">
        <x-navbar-link href="#" :active="request()->is('users')">Users</x-navbar-link>
      </li>
      <li class="h-12 flex justify-center items-center">
        <x-navbar-link href="{{ route('cart.index') }}" :active="request()->is('cart')">Cart</x-navbar-link>
      </li>
    </ul>
    <div class="flex space-x-6 text-lg mr-5">
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
          <a role="button" class="nav-link active" onclick="document.getElementById('logout').submit();">Logout</a>
          @csrf
        </form>
      @endguest
    </div>
  </div>
</nav>
