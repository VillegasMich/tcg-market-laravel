{{-- Author: Miguel Vasquez Bojanini. --}}
@extends('layout.app')
@section('content')
  <div class="flex w-full flex-grow">
    <x-user-sidebar />
    <div class="flex-grow flex flex-col w-full">
      <div class="mx-auto max-w-2xl px-4 sm:px-6 lg:max-w-7xl lg:px-8 pt-6 ">
        <div class="w-full h-fit p-5 mt-2 ">
          <h1 class="text-5xl font-semibold tracking-tight text-balance text-gray-900 mb-2">
            {{ __('Order.title') }}
          </h1>
          <p class="text-lg pl-0.5 text-pretty text-gray-500 sm:text-xl/8">
            {{ __('Order.description') }}
          </p>
        </div>
        <div class="mt-10 ml-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4">
          @foreach ($viewData['orders'] as $order)
            @if ($order->getStatus() != 'delivered')
              <div class="group relative w-fit">
                <div
                  class="aspect-square w-full rounded-md bg-gray-200 object-cover group-hover:opacity-75 lg:aspect-auto lg:h-80 p-5">
                  <div class="grid gap-x-4 gap-y-4 grid-cols-3 grid-rows-3 overflow-hidden">
                    @foreach ($order->items as $item)
                      @if ($item->TCGCard)
                        <img class="bg-black w-14 h-20 rounded-sm" src="{{ asset('/storage/' . $item->TCGCard->image) }}"
                          alt="">
                      @endif
                    @endforeach
                  </div>
                </div>
                <div class="mt-4 flex justify-between">
                  <div class="w-full">
                    <h3 class="text-sm w-full text-center text-gray-700 flex flex-col justify-center">
                      <small class="text-sm text-gray-500">{{ __('Order.status') }}: {{ $order->getStatus() }}</small>
                      <small class="text-sm text-gray-500">{{ $order->items->count() }} {{ __('Order.items') }}</small>
                      <small class="text-sm text-gray-500">{{ __('Order.total') }}:
                        ${{ number_format($order->getTotal(), 2) }}</small>
                      <a class="flex justify-center w-full" href="{{ route('order.show', ['id' => $order->getId()]) }}">
                        <span aria-hidden="true" class="absolute inset-0"></span>
                        <p class="text-base text-gray-800 font-semibold">{{ __('Order.order') }} #{{ $order->getId() }}
                        </p>
                      </a>
                    </h3>
                  </div>
                </div>
              </div>
            @endif
          @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection
