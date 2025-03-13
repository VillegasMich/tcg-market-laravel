{{-- Author: Miguel Vasquez Bojanini. --}}
@extends('layout.app')
@section('title', $viewData['title'])
@section('content')
  <div class="flex-grow flex flex-col w-full">
    <div class="mx-auto max-w-2xl px-4 sm:px-6 lg:max-w-7xl lg:px-8 pt-6 ">
      <div class="w-full h-fit p-5">
        <h1 class="text-5xl font-semibold tracking-tight text-balance text-gray-900 mb-2">
          {{ $viewData['user']->getName() }}
        </h1>
        <p class="text-lg pl-0.5 text-pretty text-gray-500 sm:text-xl/8">
          Unleash the thrill of opening brand-new packs and expanding your collection. Whether you're hunting for rare
          finds, building a powerful deck, or just enjoying the excitement of the unknown, we have the perfect pack for
          you.
        </p>
        <div class="w-full flex space-x-2">
          <form id="logout" action="{{ route('logout') }}" method="POST"
            class="` mt-5 w-36 h-16 hover:bg-red-500 border border-red-500 rounded-xl hover:text-white transition ease-in-out text-xl text-red-500 font-semibold flex flex-row justify-center items-center p-4">
            <a role="button" class="nav-link active" onclick="document.getElementById('logout').submit();">Logout</a>
            @csrf
          </form>
          <a class="mt-5 w-36 h-16 hover:bg-blue-500 border border-blue-500 rounded-xl hover:text-white transition ease-in-out text-xl text-blue-500 font-semibold flex flex-row justify-center items-center p-4"
            href="{{ route('order.index') }}">My orders</a>
          <a class="mt-5 w-36 h-16 hover:bg-green-500 border border-green-500 rounded-xl hover:text-white transition ease-in-out text-xl text-green-500 font-semibold flex flex-row justify-center items-center p-4"
            href="{{ route('cart.index') }}">My Cart</a>
          <a class="mt-5 w-36 h-16 hover:bg-blue-500 border border-blue-500 rounded-xl hover:text-white transition ease-in-out text-xl text-blue-500 font-semibold flex flex-row justify-center items-center p-4"
            href="">My wish list</a>
        </div>
      </div>
    </div>
  </div>
@endsection
