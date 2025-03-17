@extends('layout.app')
@section('title', $viewData['title'])
@section('content')
  <div class="flex w-full flex-grow">
    <x-user-sidebar />
    <div class="flex-grow flex flex-col w-full">
      <div class="mx-auto max-w-2xl px-4 sm:px-6 lg:max-w-7xl lg:px-8 pt-6 flex-grow">
        <div class="w-full h-fit p-5 mt-2 ">
          <h1 class="text-5xl font-semibold tracking-tight text-balance text-gray-900 mb-2">
            {{ __('Cart.title') }}
          </h1>
          <p class="text-lg pl-0.5 text-pretty text-gray-500 sm:text-xl/8">
            {{ __('Cart.description') }}
          </p>
        </div>
        <div class="flex h-[45rem]">
          @if (count($viewData['cartProducts']) > 0)
          <div class="flex flex-col h-inherit w-2/3">
            <div class="w-full h-auto p-4 overflow-y-scroll">
              @foreach ($viewData['cartProducts'] as $card)
                <div class="relative">
                  <button class="absolute top-0 right-0 mt-4 mr-3 text-gray-500 hover:text-gray-700">
                    <i class="fa-solid fa-x fa-xs"></i>
                  </button>
                  <hr>
                  <div class="w-full h-fit flex space-x-4 my-4">
                    <img src="{{ asset('/storage/' . $card->getImage()) }}" alt="" class="w-1/4 h-48">
                    <div class="w-[75%] h-fit flex flex-col space-y-0.5">
                      <p class="text-lg w-full font-semibold tracking-tight text-balance text-gray-900">
                        {{ $card->getName() }}
                      </p>
                      <small class="font-semibold tracking-tight text-balance text-gray-400">
                        {{ $card->getFranchise() }} | {{ __('Cart.quantity') }} : {{ $card->quantity }}
                      </small>
                      <p class="font-semibold">
                        ${{ number_format($card->getPrice(), 2) }}
                      </p>
                    </div>
                  </div>
                  <hr>
                </div>
              @endforeach
            </div>
            <form action="{{ route('cart.remove-all') }}" method="POST" class="px-5 py-4">
              @csrf
              <button class=" w-full py-3 px-4 text-lg bg-red-600 rounded-lg text-white font-semibold hover:bg-red-700">
                {{ __('Cart.empty_cart') }}
              </button>
            </form>
          </div>
            <div class="flex flex-col w-1/2 justify-between">
              <div class="w-full h-2/3 flex flex-col py-8 px-4 space-y-4 text-gray-600 text-lg">
                <h2 class="w-full text-xl text-gray-900 font-semibold">{{ __('Cart.order_summary') }}</h2>
                <div class="flex justify-between">
                  <p>{{ __('Cart.subtotal') }} </p>
                  <p class="text-black font-semibold">${{ number_format($viewData['total'], 2) }}</p>
                </div>
                <hr>
                <div class="flex justify-between">
                  <p>{{ __('Cart.shipping_estimate') }} </p>
                  <p class="text-black font-semibold">$0.0</p>
                </div>
                <hr>
                <div class="flex justify-between">
                  <p>{{ __('Cart.tax_estimate') }} </p>
                  <p class="text-black font-semibold">$0.0</p>
                </div>
                <hr>
                <div class="flex justify-between">
                  <h3 class="w-full text-xl text-gray-900 font-semibold">{{ __('Cart.total') }}</h3>
                  <p class="text-black font-semibold">${{ number_format($viewData['total'], 2) }}</p>
                </div>
                <form action="{{ route('order.save-create') }}" method="POST">
                  @csrf
                  <button class="w-full py-3 px-4 bg-indigo-600 rounded-lg text-white font-semibold hover:bg-indigo-700">
                    {{ __('Cart.checkout') }}
                  </button>
                </form>
              </div>
            </div>
          @else
            <div class="w-full h-[40rem] flex justify-center items-center">
              <p class="ml-6 text-xl text-gray-400">{{ __('Cart.empty_message') }}</p>
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection
