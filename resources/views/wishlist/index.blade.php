{{-- Author: Miguel Vasquez Bojanini. --}}
@extends('layout.app')
@section('content')
  <div class="flex w-full flex-grow">
    <x-user-sidebar />
    <div class="flex-grow flex flex-col w-full">
      <div class="mx-auto max-w-2xl px-4 sm:px-6 lg:max-w-7xl lg:px-8 pt-6 ">
        <div class="w-full h-fit p-5 mt-2 ">
          <h1 class="text-5xl font-semibold tracking-tight text-balance text-gray-900 mb-2">
            {{ __('WishList.title') }}
          </h1>
          <p class="text-lg pl-0.5 text-pretty text-gray-500 sm:text-xl/8">
            {{ __('WishList.description') }}
          </p>
        </div>
        <div class="mt-10 ml-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4">
          @foreach ($viewData['wishList']->getTCGCards() as $tcgCard)
            <div class="group relative w-fit">
              @if ($tcgCard->getImage() == 'pokemon_card_backside.png')
                <img src="{{ asset($tcgCard->getImage()) }}"
                  class="aspect-square w-full rounded-md bg-gray-200 object-cover group-hover:opacity-75 lg:aspect-auto lg:h-80">
              @else
                <img src="{{ asset('/storage/' . $tcgCard->getImage()) }}"
                  class="aspect-square w-full rounded-md bg-gray-200 object-cover group-hover:opacity-75 lg:aspect-auto lg:h-80">
              @endif
              <div class="mt-4 flex justify-between">
                <div class="w-full">
                  <h3 class="text-sm w-full text-center text-gray-700 flex flex-col justify-center">
                    <small class="text-sm text-gray-500">{{ $tcgCard->getFranchise() }}</small>
                    <a class="flex justify-center w-full" href="{{ route('tcgCard.show', ['id' => $tcgCard->getId()]) }}">
                      <span aria-hidden="true" class="absolute inset-0"></span>
                      <p class="text-base text-gray-800 font-semibold">{{ $tcgCard->getName() }}</p>
                    </a>
                  </h3>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection
