@extends('layout.app')
@section('content')
  <section class="flex-grow w-full flex justify-center items-center">
    <div class="h-1/2 w-full flex flex-col justify-center items-center p-5 pt-0">
      <img  class="mb-2" src="{{ asset('logo_tcg_market.png') }}" alt="">
      <h1 class="text-7xl font-semibold tracking-tight text-balance text-gray-900">
        {{ __('Home.title') }}
      </h1>
      <p class="mt-8 text-lg font-medium text-pretty text-gray-500 sm:text-xl/8">
        {{ __('Home.description') }}
      </p>
      <div class="flex justify-center items-center space-x-6 mt-8">
        <a href="{{ route('tcgCard.index') }}"
          class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 hover:cursor-pointer">{{ __('Home.button_cards') }}</a>
        <a href="#" class="text-sm/6 font-semibold text-gray-900">{{ __('Home.button_about') }}</a>
      </div>
    </div>
  </section>
@endsection
