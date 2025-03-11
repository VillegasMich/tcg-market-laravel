{{-- Author: Miguel Vasquez Bojanini. --}}
@extends('layout.app')
@section('title', $viewData['title'])
@section('content')
  <section class="flex-grow flex justify-center w-full">
    <div class="flex w-3/5 flex-col">
      <div class="w-full h-fit p-5 mt-2 space-y-3">
        <h1 class="text-5xl font-semibold tracking-tight text-balance text-gray-900">
          Order {{ $viewData['order']->getId() }}
        </h1>
        <p class="text-lg pl-0.5 text-pretty text-gray-500 sm:text-xl/8">
          We appreciate your order, it is currently <strong>{{ $viewData['order']->getStatus() }}</strong>. So hang tight
          and well send you confirmation very soon!
        </p>
        <hr>
        <p class="text-sm pl-0.5 text-pretty text-gray-500 sm:text-xl/8">
          A total of <strong>${{ $viewData['order']->getTotal() }} US dollars</strong> paid by
          <strong>{{ $viewData['order']->getPaymentMethod() }}</strong>.
        </p>
      </div>
      <div class="w-full h-fit p-5 pt-2 pl-0 space-y-2">
        {{-- Poner los items --}}
      </div>
    </div>
  </section>
@endsection
