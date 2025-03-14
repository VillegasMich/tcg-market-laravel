@extends('layout.adminApp')
@section('content')
<h1 class=" m-10 text-5xl font-extrabold dark:text-white text-center">{{ $viewData['subtitle1'] }}</h1>
<form class="max-w-screen-md mx-auto " method="POST"
  action="{{ route('admin.tcgCard.save-update', ['id' => $viewData['tcgCard']->getId()]) }}"
  enctype="multipart/form-data">
  @method('PUT')
  @csrf
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
  <div class="grid grid-cols-2 gap-4">
    <div class="mb-5">
      <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
      <input type="text" id="name" name="name" value="{{ $viewData['tcgCard']->getName() }}"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="Charizard EX" required />
    </div>
    <div class="mb-5">
      <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
      <input type="text" id="description" name="description" value="{{ $viewData['tcgCard']->getDescription() }}"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="Charizard Card" required />
    </div>
    <div class="mb-5">
      <label for="franchise" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Franchise</label>
      <select id="franchise" name="franchise" required
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option {{ $viewData['tcgCard']->getFranchise() == 'Pokemon' ? 'selected' : '' }} value="Pokemon">Pokemon
        </option>
        <option {{ $viewData['tcgCard']->getFranchise() == 'Yu-Gi-Oh' ? 'selected' : '' }} value="Yu-Gi-Oh">Yu-Gi-Oh
        </option>
        <option {{ $viewData['tcgCard']->getFranchise() == 'Magic The
          Gathering' ? 'selected' : '' }} value="Magic The
          Gathering">Magic The Gathering</option>
        <option {{ $viewData['tcgCard']->getFranchise() == 'Other' ? 'selected' : '' }} value="Other">Other</option>
      </select>
    </div>

    <div class="mb-5">
      <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
      <input type="number" id="price" name="price" min="0" value="{{ $viewData['tcgCard']->getPrice() }}" required
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="1000" required />
    </div>
    <div class="mb-5">
      <label for="PSAgrade" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PSA Grade</label>
      <select id="PSAgrade" name="PSAgrade" required
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option {{ $viewData['tcgCard']->getPSAgrade() == 'ungraded' ? 'selected' : '' }} value="ungraded">Ungraded
        </option>
        <option {{ $viewData['tcgCard']->getPSAgrade() == '1' ? 'selected' : '' }} value="1">1</option>
        <option {{ $viewData['tcgCard']->getPSAgrade() == '2' ? 'selected' : '' }} value="2">2</option>
        <option {{ $viewData['tcgCard']->getPSAgrade() == '3' ? 'selected' : '' }} value="3">3</option>
        <option {{ $viewData['tcgCard']->getPSAgrade() == '4' ? 'selected' : '' }} value="4">4</option>
        <option {{ $viewData['tcgCard']->getPSAgrade() == '5' ? 'selected' : '' }} value="5">5</option>
        <option {{ $viewData['tcgCard']->getPSAgrade() == '6' ? 'selected' : '' }} value="6">6</option>
        <option {{ $viewData['tcgCard']->getPSAgrade() == '7' ? 'selected' : '' }} value="7">7</option>
        <option {{ $viewData['tcgCard']->getPSAgrade() == '8' ? 'selected' : '' }} value="8">8</option>
        <option {{ $viewData['tcgCard']->getPSAgrade() == '9' ? 'selected' : '' }} value="9">9</option>
        <option {{ $viewData['tcgCard']->getPSAgrade() == '10' ? 'selected' : '' }} value="10">10</option>
      </select>
    </div>
    <div class="mb-5">
      <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
      <input type="file" id="image" name="image"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
    </div>
    <div class="mb-5">
      <label for="launchDate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Launch Date</label>
      <input type="date" id="launchDate" name="launchDate" value="{{ $viewData['tcgCard']->getLaunchDate() }}" required
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
    </div>
    <div class="mb-5">
      <label for="rarity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rarity</label>
      <select id="rarity" name="rarity" required
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option {{ $viewData['tcgCard']->getRarity() == 'Amazing Rare' ? 'selected' : '' }} value="Amazing Rare">Amazing
          Rare</option>
        <option {{ $viewData['tcgCard']->getRarity() == 'Common' ? 'selected' : '' }} value="Common">Common</option>
        <option {{ $viewData['tcgCard']->getRarity() == 'LEGEND' ? 'selected' : '' }} value="LEGEND">LEGEND</option>
        <option {{ $viewData['tcgCard']->getRarity() == 'Promo' ? 'selected' : '' }} value="Promo">PromoPromo</option>
        <option {{ $viewData['tcgCard']->getRarity() == 'Rare' ? 'selected' : '' }} value="Rare">Rare</option>
        <option {{ $viewData['tcgCard']->getRarity() == 'Rare ACE' ? 'selected' : '' }} value="Rare ACE">Rare ACE
        </option>
        <option {{ $viewData['tcgCard']->getRarity() == 'Rare BREAK' ? 'selected' : '' }} value="Rare BREAK">Rare BREAK
        </option>
        <option {{ $viewData['tcgCard']->getRarity() == 'Rare Holo' ? 'selected' : '' }} value="Rare Holo">Rare Holo
        </option>
        <option {{ $viewData['tcgCard']->getRarity() == 'Rare Holo EX' ? 'selected' : '' }} value="Rare Holo EX">Rare
          Holo EX</option>
        <option {{ $viewData['tcgCard']->getRarity() == 'Rare Holo GX' ? 'selected' : '' }} value="Rare Holo GX">Rare
          Holo GX</option>
        <option {{ $viewData['tcgCard']->getRarity() == 'Rare Holo LV.X' ? 'selected' : '' }} value="Rare Holo
          LV.X">Rare
          Holo LV.X</option>
        <option {{ $viewData['tcgCard']->getRarity() == 'Rare Holo Star' ? 'selected' : '' }} value="Rare Holo
          Star">Rare
          Holo Star</option>
        <option {{ $viewData['tcgCard']->getRarity() == 'Rare Holo V' ? 'selected' : '' }} value="Rare Holo V">Rare
          Holo V</option>
        <option {{ $viewData['tcgCard']->getRarity() == 'Rare Holo VMAX' ? 'selected' : '' }} value="Rare Holo
          VMAX">Rare
          Holo VMAX</option>
        <option {{ $viewData['tcgCard']->getRarity() == 'Rare Prime' ? 'selected' : '' }} value="Rare Prime">Rare
          Prime</option>
        <option {{ $viewData['tcgCard']->getRarity() == 'Rare Prism Star' ? 'selected' : '' }} value="Rare Prism
          Star">Rare
          Prism Star</option>
        <option {{ $viewData['tcgCard']->getRarity() == 'Rare Rainbow' ? 'selected' : '' }} value="Rare Rainbow">Rare
          Rainbow</option>
        <option {{ $viewData['tcgCard']->getRarity() == 'Rare Secret' ? 'selected' : '' }} value="Rare Secret">Rare
          Secret</option>
        <option {{ $viewData['tcgCard']->getRarity() == 'Rare Shining' ? 'selected' : '' }} value="Rare Shining">Rare
          Shining</option>
        <option {{ $viewData['tcgCard']->getRarity() == 'Rare Shiny' ? 'selected' : '' }} value="Rare Shiny">Rare
          Shiny</option>
        <option {{ $viewData['tcgCard']->getRarity() == 'Rare Shiny GX' ? 'selected' : '' }} value="Rare Shiny GX">Rare
          Shiny GX</option>
        <option {{ $viewData['tcgCard']->getRarity() == 'Rare Ultra' ? 'selected' : '' }} value="Rare Ultra">Rare
          Ultra</option>
        <option {{ $viewData['tcgCard']->getRarity() == 'Uncommon' ? 'selected' : '' }} value="Uncommon">Uncommon
        </option>
      </select>
    </div>
    <div class="mb-5">
      <label for="pullRate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pull Rate</label>
      <input type="number" step="0.01" id="pullRate" name="pullRate" value="{{ $viewData['tcgCard']->getPullRate() }}"
        required
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
    </div>
    <div class="mb-5">
      <label for="language" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Language</label>
      <select id="language" name="language" required
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option {{ $viewData['tcgCard']->getLanguage() == 'english' ? 'selected' : '' }} value="english">English
        </option>
        <option {{ $viewData['tcgCard']->getLanguage() == 'spanish' ? 'selected' : '' }} value="spanish">Spanish
        </option>
        <option {{ $viewData['tcgCard']->getLanguage() == 'french' ? 'selected' : '' }} value="french">French</option>
        <option {{ $viewData['tcgCard']->getLanguage() == 'german' ? 'selected' : '' }} value="german">German</option>
      </select>
    </div>


    <div>
      <label for="collection" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Collection</label>
      <div class="mb-5 max-h-[9rem] overflow-y-scroll scrollbar-hidden" style="scrollbar-width: thin; -ms-overflow-style: none; 
      overflow-y: scroll; 
      scrollbar-color: rgba(100, 100, 100, 0.5) transparent;">
        <ul
          class="w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
          @foreach ($viewData['collections'] as $collection)
          <li class="border-b border-gray-200 rounded-t-lg dark:border-gray-600">
            <div class="flex items-center ps-3">
              <input id="{{ $collection->getId() }}" name="collection[]" type="checkbox" {{
                $viewData['tcgCard']->getTcgPacks()->contains($collection->getId()) ? 'checked' : '' }}
              value="{{ $collection->getId() }}" class=" h-4 text-blue-600
              bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500
              dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2
              dark:bg-gray-600 dark:border-gray-500">
              <label for="{{ $collection->getId() }}"
                class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{
                $collection->getName() }}</label>
            </div>
          </li>
          @endforeach
        </ul>

      </div>
    </div>
    <div class="mb-5">
      <label for="stock" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock</label>
      <input type="number" id="stock" name="stock" value="{{ $viewData['tcgCard']->getStock() }}" required
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
    </div>
  </div>

  <button
    class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
</form>
@endsection