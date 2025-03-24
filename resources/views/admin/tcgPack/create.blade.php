@extends('layout.adminApp')
@section('content')
  <h1 class=" m-10 text-5xl font-extrabold dark:text-white text-center">{{ __('admin/TcgPack.create_title') }}</h1>
  <form class="max-w-screen-md mx-auto " method="POST" action="{{ route('admin.tcgPack.save-create') }}"
    enctype="multipart/form-data">
    @csrf
    @if (session('success'))
      <div class="bg-green-100 text-green-700 p-4 rounded-md mb-4">
        <p>{{ session('success') }}</p>
      </div>
    @endif
    @if ($errors->any())
      <div class="bg-red-100 text-red-700 p-4 rounded-md mb-4">
        <p><strong>{{ __('admin/TcgPack.error_title') }}:</strong></p>
        <ul class="list-disc list-inside">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    <div class="grid grid-cols-2 gap-4">
      <div class="mb-5">
        <label for="name"
          class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('admin/TcgPack.name') }}</label>
        <input type="text" id="name" name="name"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="Prismatic Evolutions" required />
      </div>
      <div class="mb-5">
        <label for="franchise"
          class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('admin/TcgPack.franchise') }}</label>
        <select id="franchise" name="franchise" required
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          <option value="Pokemon">Pokemon</option>
          <option value="Yu-Gi-Oh">Yu-Gi-Oh</option>
          <option value="Magic The Gathering">Magic The Gathering</option>
          <option value="Other">Other</option>
        </select>
      </div>
      <div class="mb-5">
        <label for="image"
          class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('admin/TcgPack.image') }}</label>
        <input type="file" id="image" name="image"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
      </div>
    </div>
    <button
      class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{ __('admin/TcgPack.create') }}</button>
  </form>
@endsection
