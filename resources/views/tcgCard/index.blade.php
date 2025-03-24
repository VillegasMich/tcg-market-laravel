@extends('layout.app')
@section('content')
  <div class="flex-grow flex flex-col w-full">
    <div class="mx-auto max-w-2xl px-4 sm:px-6 lg:max-w-7xl lg:px-8 pt-6 ">
      <div class="w-full h-fit p-5 mt-2 ">
        <h1 class="text-5xl font-semibold tracking-tight text-balance text-gray-900 mb-2">
          {{ __('TcgCard.title') }}
        </h1>
        <p class="text-lg pl-0.5 text-pretty text-gray-500 sm:text-xl/8">
          {{ __('TcgCard.description') }}
        </p>
      </div>
      <div class="flex justify-center items-center w-full h-fit mt-5">
        <form class="w-[70%] flex" action="{{ route('tcgCard.index') }}" method="GET">
          <div class="w-8 flex justify-center items-center mr-1">
            <i class="fa-solid fa-magnifying-glass fa-lg text-gray-700"></i>
          </div>
          <select name="sort" class="border border-gray-300 text-gray-700 rounded-md p-1 mx-2"
            onChange="this.form.submit()">
            <option value="">{{ __('TcgCard.sort_by') }}</option>
            <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>
              {{ __('TcgCard.price_low_to_high') }}</option>
            <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>
              {{ __('TcgCard.price_high_to_low') }}</option>
            <option value="psa_desc" {{ request('sort') == 'psa_desc' ? 'selected' : '' }}>{{ __('TcgCard.psa_high') }}
            </option>
            <option value="psa_asc" {{ request('sort') == 'psa_asc' ? 'selected' : '' }}>{{ __('TcgCard.psa_low') }}
            </option>
            <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>{{ __('TcgCard.newest') }}
            </option>
            <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>{{ __('TcgCard.oldest') }}
            </option>
          </select>
          <input class="flex-grow border border-gray-300 text-gray-400 rounded-l-md p-1.5 pl-2" type="text"
            name="keyword" {{ request('keyword', '') }} placeholder="Charizard ex" id=""
            value={{ request('keyword') }}>
          <button
            class="w-9 flex justify-center items-center border border-l-0 border-gray-300 rounded-r-md text-indigo-600 hover:bg-indigo-600 hover:text-white transition-colors ease-out"
            type='submit'>
            <i class="fa-solid fa-arrow-right fa-lg"></i>
          </button>
        </form>
      </div>
      <div class="mt-10 ml-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
        @foreach ($viewData['tcgCards'] as $tcgCard)
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
      <div class="mt-5 px-10 mb-5">
        {{ $viewData['tcgCards']->links() }}
      </div>
    </div>
  </div>
@endsection
