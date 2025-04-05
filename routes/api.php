<?php

use Illuminate\Support\Facades\Route;

/**
 * TCGCards api routes
 */
Route::get('/tcgcards', 'App\Http\Controllers\Api\TCGCardApiController@index')->name('api.tcgCard.index');
Route::get('/tcgcards/paginate/{numElements}', 'App\Http\Controllers\Api\TCGCardApiController@paginate')->name('api.tcgCard.paginate');
Route::get('/tcgcards/{id}', 'App\Http\Controllers\Api\TCGCardApiController@show')->name('api.tcgCard.show');

/**
 * TCGPacks api routes
 */
Route::get('/tcgpacks', 'App\Http\Controllers\Api\TCGPackApiController@index')->name('api.tcgPack.index');
Route::get('/tcgpacks/paginate/{numElements}', 'App\Http\Controllers\Api\TCGPackApiController@paginate')->name('api.tcgPack.paginate');
Route::get('/tcgpacks/{id}', 'App\Http\Controllers\Api\TCGPackApiController@show')->name('api.tcgPack.show');
