@extends('layout.adminApp')
@section('content')
<h1 class=" m-10 text-5xl font-extrabold dark:text-white text-center">{{ $viewData['subtitle1'] }}</h1>
@if (session('success'))
<div class="bg-green-100 text-green-700 p-4 rounded-md mb-4">
  <p>{{ session('success') }}</p>
</div>
@endif
@if ($errors->any())
<div class="bg-red-100 text-red-700 p-4 rounded-md mb-4">
  <p><strong>Oops! Errores:</strong></p>
  <ul class="list-disc list-inside">
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
<form class="max-w-screen-md mx-auto " method="POST" action="{{ route('admin.tcgPack.save-create') }}"
  enctype="multipart/form-data">
  @csrf
  <div class="grid grid-cols-2 gap-4">
    <div class="mb-5">
      <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
      <input type="text" id="name" name="name"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="Prismatic Evolutions" required />
    </div>
    <div class="mb-5">
      <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
      <input type="file" id="image" name="image"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
    </div>
  </div>
  <button
    class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create</button>
</form>
@endsection