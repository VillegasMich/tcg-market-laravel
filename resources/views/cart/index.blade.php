@extends('layout.app')
@section('title', $viewData['title'])
@section('content')
  <div class="flex w-full flex-grow">
    <x-user-sidebar />
    <div class="flex-grow flex flex-col w-full">
      <div class="mx-auto max-w-2xl px-4 sm:px-6 lg:max-w-7xl lg:px-8 pt-6 ">
        <div class="w-full h-fit p-5 mt-2 ">
          <h1 class="text-5xl font-semibold tracking-tight text-balance text-gray-900 mb-2">
            Your cart
          </h1>
          <p class="text-lg pl-0.5 text-pretty text-gray-500 sm:text-xl/8">
            Track and manage your orders effortlessly. View details, shipping status, and transaction history all in
            one place.
          </p>
        </div>
        <div class="w-full h-fit p-5 ml-1">
          @if (count($viewData['cartProducts']) > 0)
            <table class="w-full border-collapse border border-gray-300">
              <thead>
                <tr class="bg-gray-100">
                  <th class="border border-gray-300 px-4 py-2">Image</th>
                  <th class="border border-gray-300 px-4 py-2">Name</th>
                  <th class="border border-gray-300 px-4 py-2">Franchise</th>
                  <th class="border border-gray-300 px-4 py-2">Price</th>
                  <th class="border border-gray-300 px-4 py-2">Quantity</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($viewData['cartProducts'] as $card)
                  <tr>
                    <td class="border border-gray-300 px-4 py-2 flex justify-center items-center">
                      <img src="{{ asset('/storage/' . $card->getImage()) }}" class="h-20 w-16 rounded">
                    </td>
                    <td class="border border-gray-300 px-4 py-2">{{ $card->getName() }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $card->getFranchise() }}</td>
                    <td class="border border-gray-300 px-4 py-2">${{ number_format($card->getPrice(), 2) }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $card->quantity }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            <div class="flex w-full space-x-3 mt-5">
              <form action="{{ route('cart.remove-all') }}" method="POST">
                @csrf
                <button type="submit"
                  class="bg-red-600 hover:bg-red-700 text-white font-medium py-2 px-4 rounded transition">
                  Remove All Items
                </button>
              </form>
              <form action="{{ route('order.save-create') }}" method="POST">
                @csrf
                <button type="submit"
                  class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded transition">
                  Make an order!
                </button>
              </form>
            </div>
          @else
            <p class="text-gray-500">Your cart is empty.</p>
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection
