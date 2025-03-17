@extends('layout.adminApp')
@section('content')
  <div class="p-4">
    <div>
      <div>
        <div class="flex justify-between">
          <h1 class=" mb-5 text-xxl text-white">{{ __('admin/TcgCard.title') }}</h1>
          <a href="{{ route('admin.tcgCard.create') }}"
            class="text-white bg-green-800 p-3 mt-5 rounded-lg hover:bg-green-700  ">{{ __('admin/TcgCard.create') }}</a>
        </div>
        <div class="overflow-x-auto shadow-md sm:rounded-lg">
          <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
              <tr>
                <th scope="col" class="px-6 py-4">{{ __('admin/TcgCard.image') }}</th>
                <th scope="col" class="px-6 py-4">{{ __('admin/TcgCard.id') }}</th>
                <th scope="col" class="px-6 py-4">{{ __('admin/TcgCard.name') }}</th>
                <th scope="col" class="px-6 py-4">{{ __('admin/TcgCard.description') }}</th>
                <th scope="col" class="px-6 py-4">{{ __('admin/TcgCard.franchise') }}</th>
                <th scope="col" class="px-6 py-4">{{ __('admin/TcgCard.price') }}</th>
                <th scope="col" class="px-6 py-4">{{ __('admin/TcgCard.psa_grade') }}</th>
                <th scope="col" class="px-6 py-4">{{ __('admin/TcgCard.rarity') }}</th>
                <th scope="col" class="px-6 py-4">{{ __('admin/TcgCard.pull_rate') }}</th>
                <th scope="col" class="px-6 py-4">{{ __('admin/TcgCard.language') }}</th>
                <th scope="col" class="px-6 py-4">{{ __('admin/TcgCard.stock') }}</th>
                <th scope="col" class="px-6 py-4">{{ __('admin/TcgCard.delete') }}</th>
                <th scope="col" class="px-6 py-4">{{ __('admin/TcgCard.update') }}</th>
              </tr>
            </thead>
            @foreach ($viewData['tcgCards'] as $tcgCard)
              <tbody>

                <tr
                  class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                  <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"><img
                      src="{{ asset('/storage/' . $tcgCard->getImage()) }}" alt="Image of {{ $tcgCard->getName() }}"
                      class="w-6">
                  </td>
                  <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $tcgCard->getId() }}</td>
                  <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $tcgCard->getName() }}</td>
                  <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $tcgCard->getDescription() }}</td>
                  <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $tcgCard->getFranchise() }}</td>
                  <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $tcgCard->getPrice() }}</td>
                  <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $tcgCard->getPSAgrade() }}</td>
                  <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $tcgCard->getRarity() }}</td>
                  <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $tcgCard->getPullRate() }}</td>
                  <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $tcgCard->getLanguage() }}</td>
                  <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $tcgCard->getStock() }}</td>
                  <td scope="row" class="px-6 py-4 font-medium text-red-600 whitespace-nowrap dark:text-white">
                    <form action="{{ route('admin.tcgCard.delete', ['id' => $tcgCard->getId()]) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button
                        class="text-white bg-red-800 p-3 rounded-lg hover:bg-red-700 ">{{ __('admin/TcgCard.delete') }}</button>
                    </form>
                  </td>
                  <td scope="row" class="px-6 py-4 font-medium text-blue-600 whitespace-nowrap dark:text-white">
                    <form action="{{ route('admin.tcgCard.update', ['id' => $tcgCard->getId()]) }}" method="PUT">
                      <button
                        class="text-white bg-blue-900 p-3 rounded-lg hover:bg-blue-800">{{ __('admin/TcgCard.update') }}</button>
                    </form>
                  </td>
                </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        {{ $viewData['tcgCards']->links() }}

      </div>
    @endsection
