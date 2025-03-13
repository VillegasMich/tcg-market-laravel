@extends('layout.app')
@section('content')
  <section class="py-8 bg-white md:py-16 dark:bg-gray-900 antialiased">
    <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
      <div class="lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-16">
        <div class="shrink-0 max-w-md lg:max-w-lg mx-auto">
          <img class="w-full hidden dark:block" src="{{ asset($viewData['tcgCard']->getImage()) }}" alt="" />
        </div>
        <div class="mt-6 sm:mt-8 lg:mt-0">
          <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
            {{ $viewData['tcgCard']->getName() }} - PSA: {{ $viewData['tcgCard']->getPSAGrade() }}
          </h1>
          <div class="mt-4 sm:items-center sm:gap-4 sm:flex">
            <p class="text-2xl font-extrabold text-gray-900 sm:text-3xl dark:text-white">
              ${{ number_format($viewData['tcgCard']->getPrice(), 2) }}
            </p>

            <div class="flex items-center gap-2 mt-2 sm:mt-0">
              <a href="#"
                class="text-sm font-medium leading-none text-gray-900 underline hover:no-underline dark:text-white">
                ADD SOMETHING
              </a>
            </div>
          </div>
          <div class="mt-6 sm:gap-4 sm:items-center sm:flex sm:mt-8">
            <a href="#" title=""
              class="flex items-center justify-center py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
              role="button">
              <svg class="w-5 h-5 -ms-2 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z" />
              </svg>
              Add to wishlist
            </a>
            <form action="{{ route('tcgCard.add-to-cart', ['id' => $viewData['tcgCard']->getId()]) }}" method="POST">
              @csrf
              <button type="submit"
                class="text-white mt-4 sm:mt-0 bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300
        font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700
        focus:outline-none dark:focus:ring-primary-800 flex items-center justify-center">
                <svg class="w-5 h-5 -ms-2 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                  height="24" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
                </svg>
                Add to cart
              </button>
            </form>
          </div>
          <hr class="my-6 md:my-8 border-gray-200 dark:border-gray-800" />

          <p class="mb-6 text-gray-500 dark:text-gray-400">
            {{ $viewData['tcgCard']->getDescription() }}
          </p>

          <p class="text-gray-500 dark:text-gray-400">
          <ul class="list-disc list-inside text-gray-500 dark:text-gray-400">
            <li>PSA: {{ $viewData['tcgCard']->getPSAGrade() }}</li>
            <li>Price: ${{ number_format($viewData['tcgCard']->getPrice(), 2) }}</li>
            <li>Rarity: {{ $viewData['tcgCard']->getRarity() }}</li>
            <li>Launch Date: {{ $viewData['tcgCard']->getLaunchDate() }}</li>
            <li>Created at: {{ $viewData['tcgCard']->getCreatedAt() }}</li>
            <li>Updated at: {{ $viewData['tcgCard']->getUpdatedAt() }}</li>
          </ul>
          </p>

          @foreach ($viewData['tcgCard']->getTcgPacks() as $tcgPack)
            <div class="mt-6">
              <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Related Packs</h2>
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
