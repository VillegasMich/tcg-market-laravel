@extends('layout.adminApp')
@section('content')
  <h1 class=" m-10 text-5xl font-extrabold dark:text-white text-center">{{ $viewData['subtitle1'] }}</h1>
  <form class="max-w-screen-md mx-auto " method="POST" action="{{ route('admin.tcgCard.save-create') }}"
    enctype="multipart/form-data">
    @if (session('success'))
      <div class="bg-green-100 text-green-700 p-4 rounded-md mb-4">
        <p>{{ session('success') }}</p>
      </div>
    @endif

    @if ($errors->any())
      <div class="bg-red-100 text-red-700 p-4 rounded-md mb-4">
        <p><strong>{{ __('admin/TcgCard.error_title') }}:</strong></p>
        <ul class="list-disc list-inside">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    @csrf <div class="grid grid-cols-2 gap-4">
      <div class="mb-5">
        <label for="name"
          class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('admin/TcgCard.name') }}</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="Charizard EX" required />
      </div>
      <div class="mb-5">
        <label for="description"
          class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('admin/TcgCard.description') }}</label>
        <input type="text" id="description" name="description" value="{{ old('description') }}"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="Charizard Card" required />
      </div>
      <div class="mb-5">
        <label for="franchise"
          class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('admin/TcgCard.franchise') }}</label>
        <select id="franchise" name="franchise" required
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          <option selected value="Pokemon">Pokemon</option>
          <option value="Yu-Gi-Oh">Yu-Gi-Oh</option>
          <option value="Magic The Gathering">Magic The Gathering</option>
          <option value="Other">Other</option>
        </select>
      </div>

      <div class="mb-5">
        <label for="price"
          class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('admin/TcgCard.price') }}</label>
        <input type="number" id="price" name="price" min="0" required value="{{ old('price') }}"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="1000" required />
      </div>
      <div class="mb-5">
        <label for="PSAgrade"
          class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('admin/TcgCard.psa_grade') }}</label>
        <select id="PSAgrade" name="PSAgrade" required
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          <option selected value="ungraded">{{ __('admin/TcgCard.psa_ungraded') }}</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>
        </select>
      </div>
      <div class="mb-5">
        <label for="image"
          class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('admin/TcgCard.image') }}</label>
        <input type="file" id="image" name="image" value="{{ old('image') }}"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
      </div>
      <div class="mb-5">
        <label for="launchDate"
          class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('admin/TcgCard.launch_date') }}</label>
        <input type="date" id="launchDate" name="launchDate" required value="{{ old('launchDate') }}"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
      </div>
      <div class="mb-5">
        <label for="rarity"
          class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('admin/TcgCard.rarity') }}</label>
        <select id="rarity" name="rarity" required
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          <option value="Amazing Rare">Amazing Rare</option>
          <option value="Common">Common</option>
          <option value="LEGEND">LEGEND</option>
          <option value="Promo">PromoPromo</option>
          <option value="Rare">Rare</option>
          <option value="Rare ACE">Rare ACE</option>
          <option value="Rare BREAK">Rare BREAK</option>
          <option value="Rare Holo">Rare Holo</option>
          <option value="Rare Holo EX">Rare Holo EX</option>
          <option value="Rare Holo GX">Rare Holo GX</option>
          <option value="Rare Holo LV.X">Rare Holo LV.X</option>
          <option value="Rare Holo Star">Rare Holo Star</option>
          <option value="Rare Holo V">Rare Holo V</option>
          <option value="Rare Holo VMAX">Rare Holo VMAX</option>
          <option value="Rare Prime">Rare Prime</option>
          <option value="Rare Prism Star">Rare Prism Star</option>
          <option value="Rare Rainbow">Rare Rainbow</option>
          <option value="Rare Secret">Rare Secret</option>
          <option value="Rare Shining">Rare Shining</option>
          <option value="Rare Shiny">Rare Shiny</option>
          <option value="Rare Shiny GX">Rare Shiny GX</option>
          <option value="Rare Ultra">Rare Ultra</option>
          <option value="Uncommon">Uncommon</option>
        </select>
      </div>
      <div class="mb-5">
        <label for="pullRate"
          class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('admin/TcgCard.pull_rate') }}</label>
        <input type="number" step="0.01" id="pullRate" name="pullRate" required value="{{ old('pullRate') }}"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
      </div>
      <div class="mb-5">
        <label for="language"
          class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('admin/language') }}</label>
        <select id="language" name="language" required
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          <option selected value="english">{{ __('admin/TcgCard.english') }}</option>
          <option value="spanish">{{ __('admin/TcgCard.spanish') }}</option>
          <option value="french">{{ __('admin/TcgCard.french') }}</option>
          <option value="german">{{ __('admin/TcgCard.german') }}</option>
        </select>
      </div>

      <div>
        <label for="collection" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Collection</label>
        <div class="mb-5 max-h-[9rem] overflow-y-scroll scrollbar-hidden"
          style="scrollbar-width: thin; -ms-overflow-style: none;
      overflow-y: scroll;
      scrollbar-color: rgba(100, 100, 100, 0.5) transparent;">
          <ul
            class="w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            @foreach ($viewData['collections'] as $collection)
              <li class="border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                <div class="flex items-center ps-3">
                  <input id="{{ $collection->getId() }}" name="collection[]" type="checkbox"
                    value="{{ $collection->getId() }}"
                    class=" h-4 text-blue-600
              bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500
              dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2
              dark:bg-gray-600 dark:border-gray-500">
                  <label for="{{ $collection->getId() }}"
                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $collection->getName() }}</label>
                </div>
              </li>
            @endforeach
          </ul>

        </div>
      </div>
      <div class="mb-5">
        <label for="stock" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock</label>
        <input type="number" id="stock" name="stock" required value="{{ old('stock') }}"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
      </div>
    </div>

    <button
      class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{ __('admin/TcgCard.create') }}</button>
  </form>
@endsection
