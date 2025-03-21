@extends('layout.adminApp')
@section('content')
  <div class="p-4">
    <div>
      <div>
        <div class="flex justify-between">
          <h1 class=" mb-5 text-xxl text-white">{{ __('admin/TcgPack.title') }}</h1>
          <a href="{{ route('admin.tcgPack.create') }}"
            class="text-white bg-green-800 p-3 mt-5 rounded-lg hover:bg-green-700  ">{{ __('admin/TcgPack.create') }}</a>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
          <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
              <tr>
                <th scope="col" class="px-6 py-4">{{ __('admin/TcgPack.image') }}</th>
                <th scope="col" class="px-6 py-4">{{ __('admin/TcgPack.id') }}</th>
                <th scope="col" class="px-6 py-4">{{ __('admin/TcgPack.name') }}</th>
                <th scope="col" class="px-6 py-4">{{ __('admin/TcgPack.franchise') }}</th>
                <th scope="col" class="px-6 py-4">{{ __('admin/TcgPack.cards') }}</th>
                <th scope="col" class="px-6 py-4">{{ __('admin/TcgPack.delete') }}</th>
                <th scope="col" class="px-6 py-4">{{ __('admin/TcgPack.update') }}</th>
              </tr>
            </thead>
            @foreach ($viewData['tcgPacks'] as $tcgPack)
              <tbody>
                <tr
                  class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                  @if ($tcgPack->getImage() == 'pokemon_tcg_pack_default.png')
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"><img
                        src="{{ asset($tcgPack->getImage()) }}" alt="Image of {{ $tcgPack->getName() }}" class="w-6">
                    </td>
                  @else
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"><img
                        src="{{ asset('/storage/' . $tcgPack->getImage()) }}" alt="Image of {{ $tcgPack->getName() }}"
                        class="w-6">
                    </td>
                  @endif
                  <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $tcgPack->getId() }}</td>
                  <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $tcgPack->getName() }}</td>
                  <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $tcgPack->getFranchise() }}</td>

                  <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $tcgPack->tcgCards()->count() }}</td>
                  <td scope="row" class="px-6 py-4 font-medium text-red-600 whitespace-nowrap dark:text-white">
                    <form action="{{ route('admin.tcgPack.delete', ['id' => $tcgPack->getId()]) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button
                        class="text-white bg-red-800 p-3 rounded-lg hover:bg-red-700 ">{{ __('admin/TcgPack.delete') }}</button>
                    </form>
                  </td>
                  <td scope="row" class="px-6 py-4 font-medium text-blue-600 whitespace-nowrap dark:text-white">
                    <form action="{{ route('admin.tcgPack.update', ['id' => $tcgPack->getId()]) }}" method="PUT">
                      <button
                        class="text-white bg-blue-900 p-3 rounded-lg hover:bg-blue-800">{{ __('admin/TcgPack.update') }}</button>
                    </form>
                  </td>
                </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        {{ $viewData['tcgPacks']->links() }}
      </div>
    @endsection
