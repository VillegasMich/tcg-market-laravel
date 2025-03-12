@extends('layout.app')
@section('title', $viewData['title'])
@section('content')
  <div class="container mx-auto p-5">
    <h1 class="text-3xl font-semibold mb-4">Your Cart</h1>
    @if (count($viewData['cartProducts']) > 0)
      <form action="{{ route('cart.remove-all') }}" method="POST">
        @csrf
        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-medium py-2 px-4 rounded transition">
          Remove All Items
        </button>
      </form>
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
              <td class="border border-gray-300 px-4 py-2">
                <img src="{{ asset($card->getImage()) }}" class="h-16 w-16 rounded">
              </td>
              <td class="border border-gray-300 px-4 py-2">{{ $card->getName() }}</td>
              <td class="border border-gray-300 px-4 py-2">{{ $card->getFranchise() }}</td>
              <td class="border border-gray-300 px-4 py-2">${{ number_format($card->getPrice(), 2) }}</td>
              <td class="border border-gray-300 px-4 py-2">{{ $card->quantity }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <p class="text-gray-500">Your cart is empty.</p>
    @endif
  </div>
@endsection
