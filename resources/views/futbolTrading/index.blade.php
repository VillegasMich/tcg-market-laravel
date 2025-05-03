@extends('layout.app')
@section('content')
<div class="flex-grow flex flex-col w-full">
    <div class="mx-auto max-w-2xl px-4 sm:px-6 lg:max-w-7xl lg:px-8 pt-6 ">
        <div class="w-full h-fit p-5 mt-2 ">
            <h1 class="text-5xl font-semibold tracking-tight text-balance text-gray-900 mb-2">
                {{ __('FutbolTrading.title') }}
            </h1>
            <p class="text-lg pl-0.5 text-pretty text-gray-500 sm:text-xl/8">
                {{ __('FutbolTrading.description') }}
            </p>
        </div>
        <div class="mt-10 ml-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8 ">
            @foreach ($viewData['futbolTradingCards'] as $futbolTradingCard)
            <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-sm">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $futbolTradingCard['name']}}</h5>
                <p class="mb-3 font-normal text-gray-700">{{ $futbolTradingCard['description']}}</p>
                <p>{{ __('FutbolTrading.price') }}: ${{ number_format($futbolTradingCard['price'])}}</p>
            </div>
            @endforeach
        </div>
        <div class="my-10">
            {{ $viewData['futbolTradingCards']->links() }}
        </div>

    </div>
</div>
@endsection