@extends('layout.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
  <div class="flex-grow flex justify-center w-full">
    <div class="mx-auto max-w-2xl px-4 sm:px-6 lg:max-w-7xl lg:px-8 pt-6 ">
      <div class="w-full h-fit p-5 mt-2 ">
        <h1 class="text-5xl font-semibold tracking-tight text-balance text-gray-900 mb-2">
          Discover the Ultimate Card Packs
        </h1>
        <p class="text-lg pl-0.5 text-pretty text-gray-500 sm:text-xl/8">
          Unleash the thrill of opening brand-new packs and expanding your collection. Whether you're hunting for rare
          finds, building a powerful deck, or just enjoying the excitement of the unknown, we have the perfect pack for
          you.
        </p>
      </div>
      <div class="flex justify-center items-center w-full h-fit mt-5">
        <form class="w-[70%] flex" action="">
          <div class="w-8 flex justify-center items-center mr-1">
            <i class="fa-solid fa-magnifying-glass fa-lg text-gray-700"></i>
          </div>
          <input class="flex-grow border border-gray-300 text-gray-400 rounded-l-md p-1.5 pl-2" type="text"
            name="tcgPack" placeholder="Prismatic evolutions" id="">
          <button class="w-9 flex justify-center items-center border border-l-0 border-gray-300 rounded-r-md">
            <i class="fa-solid fa-arrow-right fa-lg text-indigo-600 "></i>
          </button>
        </form>
      </div>
      <div class="mt-10 ml-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
        @foreach ($viewData['tcgPacks'] as $tcgPack)
          <div class="group relative w-fit">
            <img src="{{ asset($tcgPack->getImage()) }}"
              class="aspect-square w-full rounded-md bg-gray-200 object-cover group-hover:opacity-75 lg:aspect-auto lg:h-80">
            <div class="mt-4 flex justify-between">
              <div class="w-full">
                <h3 class="text-sm w-full text-center text-gray-700 flex flex-col justify-center">
                  <small class="text-sm text-gray-500">Pokemon</small>
                  <a class="flex justify-center w-full" href="#">
                    <span aria-hidden="true" class="absolute inset-0"></span>
                    <p class="text-base text-gray-800 font-semibold">{{ $tcgPack->getName() }}</p>
                  </a>
                </h3>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection