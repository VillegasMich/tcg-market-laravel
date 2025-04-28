@extends('layout.app')
@section('content')
  <section class="py-8 bg-white md:py-16 antialiased">
    <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
      <div class="lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-16">
        <div class="shrink-0 max-w-md lg:max-w-lg mx-auto">
          <img src="{{ $viewData['tcgCard']['images']['large'] }}" class="w-full">
        </div>
        <div class="mt-6 sm:mt-8 lg:mt-0">
          <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">
            {{ $viewData['tcgCard']['name'] }}
          </h1>
          <hr class="my-6 md:my-8 border-gray-200" />
          <h1 class="text-xl md:my-8 border-gray-200">
            {{ __('Wiki.price_from') }} <span class="font-bold">CardMarket</span>
          </h1>

          <ul class="list-disc list-inside text-gray-700">
            @foreach ($viewData['tcgCard']['cardmarket']['prices'] as $label => $price)
              <li><span class="font-semibold">{{ $label }}:</span>
                {{ is_null($price) || $price == 0.0 ? 'N/A' : '$' . number_format($price, 2) }} </li>
            @endforeach
          </ul>
          <hr class="my-6 md:my-8" />
          <a class="text-blue-800 underline" href="{{ $viewData['tcgCard']['cardmarket']['url'] }}">
            {{ __('Wiki.check_page') }}
          </a>
        </div>
      </div>
  </section>
@endsection
