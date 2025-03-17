@extends('layout.adminApp')
@section('content')
  <div class="p-4">
    <div>
      <div>
        <h1 class=" mb-5 text-xxl text-white">{{ __('admin/Item.title') }}</h1>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
          <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
              <tr>
                <th scope="col" class="px-6 py-4">{{ __('admin/Item.id') }}</th>
                <th scope="col" class="px-6 py-4">{{ __('admin/Item.quantity') }}</th>
                <th scope="col" class="px-6 py-4">{{ __('admin/Item.subtotal') }}</th>
              </tr>
            </thead>
            @foreach ($viewData['items'] as $item)
              <tbody>
                <tr
                  class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                  <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $item->getId() }}</td>
                  <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $item->getQuantity() }}</td>
                  <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $item->getSubtotal() }}</td>
                </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        {{ $viewData['items']->links() }}
      </div>
    @endsection
