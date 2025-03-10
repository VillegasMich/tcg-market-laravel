@extends('layout.adminApp')
@section('content')
<div class="p-4">
    <div>
        <div>
            <h1 class=" mb-5 text-xxl text-white">{{ $viewData['subtitle1'] }}</h1>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-4">Image</th>
                            <th scope="col" class="px-6 py-4">ID</th>
                            <th scope="col" class="px-6 py-4">Name</th>
                            <th scope="col" class="px-6 py-4">Description</th>
                            <th scope="col" class="px-6 py-4">Franchise</th>
                            <th scope="col" class="px-6 py-4">Price</th>
                            <th scope="col" class="px-6 py-4">PSAgrade</th>
                            <th scope="col" class="px-6 py-4">Rarity</th>
                            <th scope="col" class="px-6 py-4">Pull Rate</th>
                            <th scope="col" class="px-6 py-4">Language</th>
                            <th scope="col" class="px-6 py-4">Stock</th>
                        </tr>
                    </thead>
                    @foreach ($viewData['tcgCards'] as $tcgCard)
                    <tbody>
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"><img
                                    src="{{ asset($tcgCard->getImage()) }}" alt="Image of {{ $tcgCard->getName() }}"
                                    class="w-6"></td>
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{
                                $tcgCard->getId() }}</td>
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{
                                $tcgCard->getName() }}</td>
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{
                                $tcgCard->getDescription() }}</td>
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{
                                $tcgCard->getFranchise() }}</td>
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{
                                $tcgCard->getPrice() }}</td>
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{
                                $tcgCard->getPSAgrade() }}</td>
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{
                                $tcgCard->getRarity() }}</td>
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{
                                $tcgCard->getPullRate() }}</td>
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{
                                $tcgCard->getLanguage() }}</td>
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{
                                $tcgCard->getStock() }}</td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
            {{$viewData['tcgCards']->links()}}
        </div>
        @endsection