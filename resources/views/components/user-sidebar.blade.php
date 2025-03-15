<div class="flex h-full w-72 p-5 flex-col space-y-3 bg-slate-50">
  <h2 class="w-full text-xl flex h-fit rounded-lg  p-3 font-semibold justify-center">{{ __('UserSidebar.title') }}</h2>
  <a href="{{ route('cart.index') }}"
    class="w-full text-lg flex h-fit rounded-lg border p-3 font-semibold items-center space-x-2 hover:bg-slate-100">
    <div class="flex justify-center items-center h-full mt-1">
      <i class="fa-solid fa-md fa-cart-shopping"></i>
    </div>
    <p>{{ __('UserSidebar.my_cart') }}</p>
  </a>
  @if (Auth::check())
    <a href="{{ route('order.index') }}"
      class="w-full text-lg flex h-fit rounded-lg border p-3 font-semibold items-center space-x-2.5 hover:bg-slate-100">
      <div class="flex justify-center items-center h-full mt-1 ml-1">
        <i class="fa-solid fa-md fa-bars"></i>
      </div>
      <p>{{ __('UserSidebar.my_orders') }}</p>
    </a>
    <a href=""
      class="w-full text-lg flex h-fit rounded-lg border p-3 font-semibold space-x-2 hover:bg-slate-100">
      <div class="flex justify-center items-center h-full mt-0.5 ml-1">
        <i class="fa-solid fa-md fa-heart"></i>
      </div>
      <p>{{ __('UserSidebar.my_wishlist') }}</p>
    </a>
    <div
      class="w-full text-lg flex h-fit rounded-lg border p-3 font-semibold space-x-2.5 hover:bg-red-500 hover:text-white transition ease-in-out">
      <div class="flex justify-center items-center h-full mt-0.5 ml-1">
        <i class="fa-solid fa-right-from-bracket fa-md fa-flip-horizontal"></i>
      </div>
      <form id="logout" action="{{ route('logout') }}" method="POST" class="">
        <a role="button" class="nav-link active"
          onclick="document.getElementById('logout').submit();">{{ __('UserSidebar.logout') }}</a>
        @csrf
      </form>
    </div>
  @endif
</div>
