@extends('layout.app')
@section('content')
  <section class="py-8 bg-white md:py-16 antialiased">
    <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
      <div class="lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-16">
        <div class="shrink-0 max-w-md lg:max-w-lg mx-auto">
          <img class="w-full" src="{{ asset('/storage/' . $viewData['tcgCard']->getImage()) }}" alt="" />
        </div>
        <div class="mt-6 sm:mt-8 lg:mt-0">
          <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">
            {{ $viewData['tcgCard']->getName() }} - {{ __('TcgCard.show_psa') }}
            {{ $viewData['tcgCard']->getPSAGrade() }}
          </h1>
          <div class="mt-4 sm:items-center sm:gap-4 sm:flex">
            <p class="text-2xl font-extrabold text-gray-900 sm:text-3xl">
              ${{ number_format($viewData['tcgCard']->getPrice(), 2) }}
            </p>
          </div>
          <div class="mt-6 sm:gap-4 sm:items-center sm:flex sm:mt-8">
            <form action="{{ route('tcgCard.add-to-wishList', ['id' => $viewData['tcgCard']->getId()]) }}" method="POST">
              @csrf
              <button type="submit"
                class="text-black mt-4 sm:mt-0 bg-primary-700 hover:bg-gray-200 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none flex items-center justify-center">
                <svg class="w-5 h-5 -ms-2 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                  height="24" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z" />
                </svg>
                {{ __('TcgCard.show_add_to_wishlist') }}
              </button>
            </form>
            <form action="{{ route('tcgCard.add-to-cart', ['id' => $viewData['tcgCard']->getId()]) }}" method="POST">
              @csrf
              <button type="submit"
                class="text-black mt-4 sm:mt-0 bg-primary-700 hover:bg-gray-200 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none flex items-center justify-center">
                <svg class="w-5 h-5 -ms-2 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                  height="24" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
                </svg>
                {{ __('TcgCard.show_add_to_cart') }}
              </button>
            </form>
          </div>
          <hr class="my-6 md:my-8 border-gray-200" />

          <p class="mb-6 text-gray-700">
            {{ $viewData['tcgCard']->getDescription() }}
          </p>

          <ul class="list-disc list-inside text-gray-700">
            <li>{{ __('TcgCard.show_psa') }} {{ $viewData['tcgCard']->getPSAGrade() }}</li>
            <li>{{ __('TcgCard.show_price') }} ${{ number_format($viewData['tcgCard']->getPrice(), 2) }}</li>
            <li>{{ __('TcgCard.show_rarity') }} {{ $viewData['tcgCard']->getRarity() }}</li>
            <li> {{ __('TcgCard.show_franchise') }} {{ $viewData['tcgCard']->getFranchise() }}</li>
            <li> {{ __('TcgCard.show_stock') }} {{ $viewData['tcgCard']->getStock() }}</li>
            <li>{{ __('TcgCard.show_launch_date') }} {{ $viewData['tcgCard']->getLaunchDate() }}</li>
            <li>{{ __('TcgCard.show_created_at') }} {{ $viewData['tcgCard']->getCreatedAt() }}</li>
            <li>{{ __('TcgCard.show_updated_at') }} {{ $viewData['tcgCard']->getUpdatedAt() }}</li>
          </ul>

          @foreach ($viewData['tcgCard']->getTcgPacks() as $tcgPack)
            <div class="mt-6">
              <h2 class="text-lg font-semibold text-gray-900">Related Packs</h2>
              <div class="grid grid-cols-2 gap-4 mt-4 sm:grid-cols-3 lg:grid-cols-4">
                <div class="relative">
                  <a href="{{ route('tcgPack.show', $tcgPack->getId()) }}">
                    <img class="w-full rounded-lg" src="{{ asset($tcgPack->getImage()) }}" alt="" />
                  </a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
  </section>
@endsection
