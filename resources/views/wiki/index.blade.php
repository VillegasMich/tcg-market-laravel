@extends('layout.app')
@section('content')
  <div class="flex-grow flex flex-col w-full">
    <div class="mx-auto max-w-2xl px-4 sm:px-6 lg:max-w-7xl lg:px-8 pt-6 ">
      <div class="w-full h-fit p-5 mt-2 ">
        <h1 class="text-5xl font-semibold tracking-tight text-balance text-gray-900 mb-2">
          {{ __('Wiki.title') }}
        </h1>
        <p class="text-lg pl-0.5 text-pretty text-gray-500 sm:text-xl/8">
          {{ __('Wiki.description') }}
        </p>
      </div>
      <div class="flex justify-center items-center w-full h-fit mt-5">
        <form class="w-[70%] flex" action="{{ route('wiki.index') }}" method="GET">
          <div class="w-8 flex justify-center items-center mr-1">
            <i class="fa-solid fa-magnifying-glass fa-lg text-gray-700"></i>
          </div>
          <input class="flex-grow border border-gray-300 text-gray-400 rounded-l-md p-1.5 pl-2" type="text"
            name="q" placeholder="Charizard ex" id="" value={{ request('q') }}>
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
            <img src="{{ $tcgCard['images']['small'] }}"
              class="aspect-square w-full rounded-md bg-gray-200 object-cover group-hover:opacity-75 lg:aspect-auto lg:h-80">
            <div class="mt-4 flex justify-between">
              <div class="w-full">
                <h3 class="text-sm w-full text-center text-gray-700 flex flex-col justify-center">
                  <small class="text-sm text-gray-500">{{ $tcgCard['supertype'] }}</small>
                  <a class="flex justify-center w-full" href="{{ route('wiki.show', ['id' => $tcgCard['id']]) }}">
                    <span aria-hidden="true" class="absolute inset-0"></span>
                    <p class="text-base text-gray-800 font-semibold">{{ $tcgCard['name'] }}</p>
                  </a>
                </h3>
              </div>
            </div>
          </div>
        @endforeach
      </div>
      <div class="mt-10 flex justify-center items-center">
        <nav class="flex items-center space-x-2">
          {{-- First Page Selected Button --}}
          @if ($viewData['currentPage'] == 1)
            <a href="{{ url()->current() . '?page=1' }}"
              class="px-4 py-2 bg-blue-600 text-white rounded-md transition duration-300">
              1
            </a>
          @endif
          {{-- Previous Button --}}
          @if ($viewData['currentPage'] > 1)
            <a href="{{ url()->current() . '?page=' . ($viewData['currentPage'] - 1) }}"
              class="px-4 py-2 bg-gray-200 text-gray-700 hover:bg-gray-300 rounded-md transition duration-300">
              Previous
            </a>
          @endif
          {{-- First Page Button --}}
          @if ($viewData['currentPage'] > 3)
            <a href="{{ url()->current() . '?page=1' }}"
              class="px-4 py-2 bg-gray-200 text-gray-700 hover:bg-gray-300 rounded-md transition duration-300">
              1
            </a>
            <span class="px-2 text-gray-500">...</span>
          @endif
          {{-- Middle Pages --}}
          @for ($i = max(2, $viewData['currentPage'] - 1); $i <= min($viewData['totalPages'] - 1, $viewData['currentPage'] + 1); $i++)
            <a href="{{ url()->current() . '?page=' . $i }}"
              class="px-4 py-2 rounded-md {{ $i == $viewData['currentPage'] ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }} transition duration-300">
              {{ $i }}
            </a>
          @endfor
          {{-- Last Page Button --}}
          @if ($viewData['currentPage'] < $viewData['totalPages'] - 2)
            <span class="px-2 text-gray-500">...</span>
            <a href="{{ url()->current() . '?page=' . $viewData['totalPages'] }}"
              class="px-4 py-2 bg-gray-200 text-gray-700 hover:bg-gray-300 rounded-md transition duration-300">
              {{ $viewData['totalPages'] }}
            </a>
          @endif
          {{-- Next Button --}}
          @if ($viewData['currentPage'] < $viewData['totalPages'])
            <a href="{{ url()->current() . '?page=' . ($viewData['currentPage'] + 1) }}"
              class="px-4 py-2 bg-gray-200 text-gray-700 hover:bg-gray-300 rounded-md transition duration-300">
              Next
            </a>
          @endif
        </nav>
      </div>
    </div>
  </div>
@endsection
