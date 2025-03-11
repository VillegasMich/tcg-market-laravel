{{-- Author: Miguel Vasquez Bojanini. --}}
@extends('layout.app')
@section('title', $viewData['title'])
@section('content')
  <section class="flex-grow flex justify-center w-full pt-6">
    <div class="flex w-3/5 flex-col">
      <div class="w-full h-fit p-5 mt-2">
        <h1 class="text-5xl font-semibold tracking-tight text-balance text-gray-900 mb-2">
          {{ $viewData['title'] }}
        </h1>
        <p class="text-lg pl-0.5 text-pretty text-gray-500 sm:text-xl/8">
          Track and manage your orders effortlessly. View details, shipping status, and transaction history all in
          one place.
        </p>
      </div>
      <div class="w-full h-fit p-5 pt-2 pl-0 space-y-2">
        @foreach ($viewData['orders'] as $order)
          <article class="w-full rounded-lg h-fit p-5">
            <div class="flex justify-between">
              <div class="flex space-x-3 mb-3">
                <p class="text-3xl font-semibold tracking-tight text-balance text-gray-900">
                  Order {{ $order->getId() }}
                </p>
                <div class="flex justify-center items-center text-base pl-0.5 text-pretty text-gray-500">
                  {{ ucfirst($order->getStatus()) }}
                </div>
              </div>
              <p class="text-base flex justify-center items-center">
                ${{ $order->getTotal() }}.00
              </p>
            </div>
            <a href="{{ route('order.show', ['id' => $order->getId()]) }}"
              class="py-1 px-3 ml-0.5 text-sm font-semibold text-white bg-indigo-600 rounded-xl">
              Details
            </a>
          </article>
          <hr>
        @endforeach
      </div>
    </div>
  </section>
@endsection