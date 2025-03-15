@extends('layout.adminApp')
@section('content')
<h1
  class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white p-8 text-center">
  {{ $viewData['title'] }}
</h1>
<div class="grid grid-cols-5 grid-rows-6 gap-4 w-4/5 m-auto">
  <a href="{{ route('admin.tcgCard.index')}}"
    class="col-span-3 row-span-1 bg-gray-800 rounded-xl p-4 shadow-md hover:shadow-xl hover:bg-gray-900 block">
    <h2 class="text-2xl font-semibold text-white">{{ $viewData['subtitle1']}}</h2>
    <p class="text-lg text-gray-400 mt-2">Total TCG Cards: {{ $viewData['totalTcgCards']}}</p>
    <div class="flex gap-2 mt-4 overflow-x-auto">
      @foreach($viewData['tcgCards'] as $tcgCard)
      <img src="{{ asset('/storage/' . $tcgCard->getImage()) }}" alt="TCG Card"
        class="h-20 w-auto rounded-lg shadow-md">
      @endforeach
    </div>
  </a>

  <a href="{{ route('admin.tcgPack.index')}}"
    class="col-span-3 row-span-1 bg-gray-800 rounded-xl p-4 shadow-md hover:shadow-xl hover:bg-gray-900 block">
    <h2 class="text-2xl font-semibold text-white">{{ $viewData['subtitle2']}}</h2>
    <p class="text-lg text-gray-400 mt-2">Total TCG Packs: {{ $viewData['totalTcgPacks']}}</p>
    <div class="flex gap-2 mt-4 overflow-x-auto">
      @foreach($viewData['tcgPacks'] as $tcgPack)
      <img src="{{ asset('/storage/' . $tcgPack->getImage()) }}" alt="TCG Pack"
        class="h-20 w-auto rounded-lg shadow-md">
      @endforeach
    </div>
  </a>

  <a href="{{ route('admin.user.index')}}"
    class="col-span-2 col-start-1 row-start-3 shadow-md hover:shadow-xl bg-gray-800 rounded-xl p-4 hover:bg-gray-900 block">
    <h2 class="text-xl font-semibold text-white">{{ $viewData['subtitle6']}}</h2>
    <p class="text-lg text-gray-400 mt-2">Total Users: {{ $viewData['totalUsers']}} </p>
  </a>

  <a href="{{ route('admin.wishList.index')}}"
    class="col-span-2 col-start-1 row-start-4 shadow-md hover:shadow-xl bg-gray-800 rounded-xl p-4 hover:bg-gray-900 block">
    <h2 class="text-xl font-semibold text-white">{{ $viewData['subtitle5']}}</h2>
    <p class="text-lg text-gray-400 mt-2">Total Wish Lists: {{ $viewData['totalWishLists']}}</p>
  </a>

  <a href="{{ route('admin.order.index')}}"
    class="col-span-3 row-span-2 col-start-3 shadow-md hover:shadow-xl row-start-3 bg-gray-800 rounded-xl p-4 hover:bg-gray-900 block">
    <h2 class="text-xl font-semibold text-white">{{ $viewData['subtitle4']}}</h2>
    <p class="text-lg text-gray-400 mt-2">Total Orders: {{ $viewData['totalOrders']}} </p>

    <ul class="mt-4 space-y-2">
      @foreach($viewData['orders'] as $order)
      <li class="border-2 border-gray-700 p-3 rounded-lg shadow-md text-gray-300 flex justify-between items-center">
        <span class="font-medium">{{ $order->getId() }}</span>
        <span class="px-3 py-1 rounded-lg text-white text-sm">
          Status: {{ ucfirst($order->getStatus()) }}
        </span>
        <span class="text-gray-400">Payment: {{ ucfirst($order->getPaymentMethod()) }}</span>
      </li>
      @endforeach
    </ul>
  </a>

  <a href="{{ route('admin.item.index')}}"
    class="col-span-2 row-span-2 col-start-4 shadow-md hover:shadow-xl row-start-1 bg-gray-800 rounded-xl p-4 hover:bg-gray-900 block">
    <h2 class="text-xl font-semibold text-white">{{ $viewData['subtitle3']}}</h2>
    <p class="text-lg text-gray-400 mt-2">Total Items: {{ $viewData['totalItems']}} </p>

    <ul class="mt-4 space-y-2">
      @foreach($viewData['items'] as $item)
      <li class="border-2 border-gray-700 p-3 rounded-lg shadow-md text-gray-300 flex justify-between items-center">
        <span class="font-medium">{{ $item->getId() }}</span>
        <span class="text-gray-400">Qty: {{ $item->getQuantity() }}</span>
        <span class= font-semibold">Subtotal: ${{ number_format($item->getSubtotal(), 2) }}</span>
      </li>
      @endforeach
    </ul>
  </a>

</div>
@endsection