{{-- Author: Miguel Vasquez Bojanini. --}}
@extends('layout.app')
@push('head')
<script src="https://www.paypal.com/sdk/js?client-id={{config('paypal.client_id')}}&currency=USD&intent=capture">
</script>
@endpush
@section('content')
<div class="flex w-full flex-grow">
  <x-user-sidebar />
  <div class="flex-grow flex flex-col w-full">
    <div class="mx-auto max-w-2xl px-4 sm:px-6 lg:max-w-7xl lg:px-8 pt-6 ">
      <div class="w-full h-fit p-5 mt-2 ">
        <h1 class="text-5xl font-semibold tracking-tight text-balance text-gray-900 mb-2">
          {{ __('Order.order') }} - {{ $viewData['order']->getStatus() }}
        </h1>
        <p class="text-lg pl-0.5 text-pretty text-gray-500 sm:text-xl/8">
          {{ __('Order.description') }}
        </p>
        <div class="p-4 text-sm text-green-800 rounded-lg bg-green-50 hidden" id="success-alert" role="alert">
          <span class="font-medium">{{ __('Order.paid') }}</span>
        </div>
      </div>
      <div class="mt-10 ml-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4">
        @foreach ($viewData['order']->getItems() as $item)
        <div class="group relative w-fit">
          @if ($item->getTCGCard()->getImage() == 'pokemon_card_backside.png')
          <img src="{{ asset($item->getTCGCard()->getImage()) }}"
            class="aspect-square w-full rounded-md bg-gray-200 object-cover group-hover:opacity-75 lg:aspect-auto lg:h-80">
          @else
          <img src="{{ asset('/storage/' . $item->getTCGCard()->getImage()) }}"
            class="aspect-square w-full rounded-md bg-gray-200 object-cover group-hover:opacity-75 lg:aspect-auto lg:h-80">
          @endif
          <div class="mt-4 flex justify-between">
            <div class="w-full">
              <h3 class="text-sm w-full text-center text-gray-700 flex flex-col justify-center">
                <small class="text-sm text-gray-500">{{ __('Order.quantity') }}: {{ $item->getQuantity() }}</small>
                <small class="text-sm text-gray-500">{{ __('Order.item') }} #{{ $item->getId() }}</small>
                <a class="flex justify-center w-full" href="">
                  <span aria-hidden="true" class="absolute inset-0"></span>
                  <p class="text-base text-gray-800 font-semibold">{{ $item->getTCGCard()->getName() }}</p>
                </a>
              </h3>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <div class="w-1/2">
        @if ($viewData['order']->getStatus() != 'shipped')
        <form action="{{ route('order.pay', ['id' => $viewData['order']->getId()]) }}" method="POST" class="ml-7 mt-6">
          @method('PUT')
          @csrf
          <button id="pay_button"
            class="bg-gray-700 mt-4 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded transition invisible">{{
            __('Order.pay') }}
            ${{ number_format($viewData['order']->getTotal()) }}</button>
          <div id="payment_options"></div>
        </form>
        <form action="{{ route('order.delete', ['id' => $viewData['order']->getId()])}}" method="POST"
          class="ml-7 mt-6">
          @csrf
          @method('DELETE')
          <button class="bg-gray-700 mt-4 hover:bg-red-700 text-white font-medium py-2 px-4 rounded transition">
            Cancel order
          </button>
        </form>
        @endif
      </div>
    </div>
  </div>
</div>
@if ($viewData['order']->getStatus() != 'shipped')
<script>
  paypal.Buttons({
  createOrder: function() {
      return fetch('{{ route('paypal.create', ['amount' => $viewData['order']->getTotal()]) }}')
      .then((response) => response.text())
      .then((id) => {return id;});
  },
  onApprove: function () {
    return fetch("{{ route('paypal.complete') }}", {method: "post", headers: {"X-CSRF-Token": '{{csrf_token()}}'}})
      .then((response) => response.json())
      .then((order_details) => {
        console.log(order_details);
        document.getElementById('pay_button').click();
        document.getElementById('success-alert').classList.remove('hidden');
      })
      .catch((error) => {
        console.log(error);
      });

  },

  onCancel: function (data) {
    console.log('Cancelled');
  },

  onError: function (err) {
    console.log(err);
  }
  
}).render('#payment_options');
</script>
@endif
@endsection