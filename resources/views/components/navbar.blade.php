<nav class="w-full h-fit flex font-medium shadow-sm">
  <a class="text-2xl w-1/6 flex justify-center items-center" href="{{ route('home.index') }}">
    <img class=" h-8 w-7 mr-1 mt-1" src="{{ asset('logo_tcg_market.png') }}" alt=""> TCG Market
  </a>
  <div class="w-11/12 flex justify-between items-center h-12" id="navbarSupportedContent">
    <ul class="flex space-x-6 text-lg">
      <li class="h-12 flex justify-center items-center">
        <x-navbar-link href="{{ route('tcgCard.index') }}" :active="request()->is('tcgcards')">{{ __('Navbar.cards') }}</x-navbar-link>
      </li>
      <li class="h-12 flex justify-center items-center">
        <x-navbar-link href="{{ route('tcgPack.index') }}" :active="request()->is('tcgpacks')">{{ __('Navbar.packs') }}</x-navbar-link>
      </li>
      <li class="h-12 flex justify-center items-center">
        <x-navbar-link href="{{ route('cart.index') }}" :active="request()->is('cart')">{{ __('Navbar.cart') }}</x-navbar-link>
      </li>
      <li class="h-12 flex justify-center items-center">
        <x-navbar-link href="{{ route('wiki.index') }}" :active="request()->is('wiki')">Wiki</x-navbar-link>
      </li>
      @if (Auth::check() && Auth::user()->role === 'admin')
        <li class="h-12 flex justify-center items-center">
          <x-navbar-link class="nav-link"
            href="{{ route('admin.index') }}">{{ __('Navbar.admin_dashboard') }}</x-navbar-link>
        </li>
      @endif
    </ul>
    <x-breadcrumb />
    <div class="flex space-x-6 text-lg mr-5 justify-center">
      <!-- Language Dropdown -->
      <div class="relative">
        <button class="px-3 py-1 bg-gray-200 rounded" id="languageButton">
          {{ strtoupper(app()->getLocale()) }}
        </button>
        <div id="languageDropdown" class="absolute hidden bg-white shadow-md rounded mt-1">
          <a href="{{ route('language.switch', ['locale' => 'en']) }}"
            class="block px-4 py-2 hover:bg-gray-100">{{ __('Navbar.english') }}</a>
          <a href="{{ route('language.switch', ['locale' => 'es']) }}"
            class="block px-4 py-2 hover:bg-gray-100">{{ __('Navbar.spanish') }}</a>
        </div>
      </div>
      @guest
        @if (Route::has('login'))
          <div class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Navbar.login') }}</a>
          </div>
        @endif
        @if (Route::has('register'))
          <div class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Navbar.register') }}</a>
          </div>
        @endif
      @else
        <span class="text-gray-400 flex justify-center items-center">Balance:
          {{ number_format(Auth::user()->getBalance()) }}</span>
        <a href="{{ route('user.index') }}" class="flex justify-center items-center">{{ __('Navbar.profile') }}</a>
      @endguest
    </div>
  </div>
</nav>

<script>
  document.getElementById("languageButton").addEventListener("click", function() {
    document.getElementById("languageDropdown").classList.toggle("hidden");
  });
</script>
