{{-- Author: Miguel Vasquez Bojanini. --}}
@extends('layout.app')
@section('content')
  <div class="flex w-full flex-grow">
    <x-user-sidebar />
    <div class="flex flex-grow justify-center items-center">
      <div class=" w-2/5 h-3/4 border rounded-lg">
        <div class="w-full h-1/3 flex justify-center items-center bg-gray-700 rounded-t-lg"></div>
        <div class="m-5 space-y-4">
          <h1 class="text-5xl font-semibold tracking-tight text-balance text-gray-900">{{ $viewData['user']->getName() }}
          </h1>
          <div class="text-base pl-0.5 text-pretty text-gray-500">
            {{ $viewData['user']->getEmail() }} - {{ $viewData['user']->getRole() }}
          </div>
          <p class="text-xl text-justify pl-0.5 text-pretty text-gray-500">
            {{ __('User.description') }}
          </p>
        </div>
      </div>
    </div>
  </div>

@endsection
