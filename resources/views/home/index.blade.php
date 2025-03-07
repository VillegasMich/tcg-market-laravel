@extends('layout.app')
@section('content')
    <section class="flex-grow w-full flex justify-center items-center">
        <div class="h-1/2 w-full flex flex-col justify-center items-center p-5">
            <h1 class="text-7xl font-semibold tracking-tight text-balance text-gray-900">
                Redefining your TCG experience
            </h1>
            <p class="mt-8 text-lg font-medium text-pretty text-gray-500 sm:text-xl/8">
                Discover rare and coveted cards with ease, your next great find is just a click away.
            </p>
            <div class="flex justify-center items-center space-x-6 mt-8">
                <a class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 hover:cursor-pointer">Search cards</a>
                <a href="#" class="text-sm/6 font-semibold text-gray-900">Learn more</a>
            </div>
        </div>
    </section>
@endsection
