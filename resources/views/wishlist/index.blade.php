{{-- Author: Miguel Vasquez Bojanini. --}}
@extends('layout.app')
@section('title', $viewData['title'])
@section('content')
  <div class="flex w-full flex-grow">
    <x-user-sidebar />
    <div class="flex-grow flex flex-col w-full">
      <div class="mx-auto max-w-2xl px-4 sm:px-6 lg:max-w-7xl lg:px-8 pt-6 ">
        <div class="w-full h-fit p-5 mt-2 ">
          <h1 class="text-5xl font-semibold tracking-tight text-balance text-gray-900 mb-2">
            My wishlist
          </h1>
          <p class="text-lg pl-0.5 text-pretty text-gray-500 sm:text-xl/8">
            Track and manage your orders effortlessly. View details, shipping status, and transaction history all in
            one place.
          </p>
        </div>
        <div class="bg-red-500 w-full h-fit">
            @foreach ($viewData['wishList']->getTCGCards() as $tcgCard)
            <div class="relative">
                <button class="absolute top-0 right-0 mt-4 mr-3 text-gray-500 hover:text-gray-700">
                  <i class="fa-solid fa-x fa-xs"></i>
                </button>
                <hr>
                <div class="w-full h-fit flex space-x-4 my-4">
                  <img src="{{ asset('/storage/' . $tcgCard->getImage()) }}" alt="" class="w-1/4 h-48">
                  <div class="w-[75%] h-fit flex flex-col space-y-0.5">
                    <p class="text-lg w-full font-semibold tracking-tight text-balance text-gray-900">
                      {{ $tcgCard->getName() }}
                    </p>
                    <small class="font-semibold tracking-tight text-balance text-gray-400">
                      {{ $tcgCard->getFranchise() }}
                    </small>
                    <p class="font-semibold">
                      ${{ number_format($tcgCard->getPrice(), 2) }}
                    </p>
                  </div>
                </div>
                <hr>
              </div>
            @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection
