<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

/**
 * TCGCards routes
 */
Route::get('/tcgcards', 'App\Http\Controllers\TCGCardController@index')->name('tcgCards.index');
Route::get('/tcgcards/create', 'App\Http\Controllers\TCGCardController@create')->name('tcgCards.create');
Route::get('/tcgcards/update', 'App\Http\Controllers\TCGCardController@update')->name('tcgCards.update');
Route::post('/tcgcards/save-create', 'App\Http\Controllers\TCGCardController@saveCreate')->name('tcgCards.save-create');
Route::post('/tcgcards/save-update', 'App\Http\Controllers\TCGCardController@saveUpdate')->name('tcgCards.save-update');
Route::get('/tcgcards/{id}', 'App\Http\Controllers\TCGCardController@show')->name('tcgCards.show');
Route::delete('/tcgcards/{id}', 'App\Http\Controllers\TCGCardController@delete')->name('tcgCards.delete');

/**
 * TCGPacks routes
 */
Route::get('/tcgpacks', 'App\Http\Controllers\TCGPackController@index')->name('tcgPacks.index');
Route::get('/tcgpacks/create', 'App\Http\Controllers\TCGPackController@create')->name('tcgPacks.create');
Route::get('/tcgpacks/update', 'App\Http\Controllers\TCGPackController@update')->name('tcgPacks.update');
Route::post('/tcgpacks/save-create', 'App\Http\Controllers\TCGPackController@saveCreate')->name('tcgPacks.save-create');
Route::post('/tcgpacks/save-update', 'App\Http\Controllers\TCGPackController@saveUpdate')->name('tcgPacks.save-update');
Route::get('/tcgpacks/{id}', 'App\Http\Controllers\TCGPackController@show')->name('tcgPacks.show');
Route::delete('/tcgpacks/{id}', 'App\Http\Controllers\TCGPackController@delete')->name('tcgPacks.delete');

/**
 * Order routes
 */

Route::get('/orders/create', 'App\Http\Controllers\OrderController@create')->name('order.create');
Route::get('/orders/update/{id}', 'App\Http\Controllers\OrderController@update')->name('order.update');
Route::get('/orders/{id}', 'App\Http\Controllers\OrderController@show')->name('order.show');
Route::post('/orders/create', 'App\Http\Controllers\OrderController@saveCreate')->name('order.save-create');
Route::put('/orders/{id}', 'App\Http\Controllers\OrderController@saveUpdate')->name('order.save-update');
Route::delete('/orders/{id}','App\Http\Controllers\OrderController@delete')->name('order.delete');