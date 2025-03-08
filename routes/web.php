<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/**
 * Home routes
 */
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');

/**
 * TCGCards routes
 */
Route::get('/tcgcards', 'App\Http\Controllers\TCGCardController@index')->name('tcgCard.index');
Route::get('/tcgcards/create', 'App\Http\Controllers\TCGCardController@create')->name('tcgCard.create');
Route::get('/tcgcards/update', 'App\Http\Controllers\TCGCardController@update')->name('tcgCard.update');
Route::post('/tcgcards/save-create', 'App\Http\Controllers\TCGCardController@saveCreate')->name('tcgCard.save-create');
Route::post('/tcgcards/save-update', 'App\Http\Controllers\TCGCardController@saveUpdate')->name('tcgCard.save-update');
Route::get('/tcgcards/{id}', 'App\Http\Controllers\TCGCardController@show')->name('tcgCard.show');
Route::delete('/tcgcards/{id}', 'App\Http\Controllers\TCGCardController@delete')->name('tcgCard.delete');

/**
 * TCGPacks routes
 */
Route::get('/tcgpacks', 'App\Http\Controllers\TCGPackController@index')->name('tcgPack.index');
Route::get('/tcgpacks/create', 'App\Http\Controllers\TCGPackController@create')->name('tcgPack.create');
Route::get('/tcgpacks/update', 'App\Http\Controllers\TCGPackController@update')->name('tcgPack.update');
Route::post('/tcgpacks/save-create', 'App\Http\Controllers\TCGPackController@saveCreate')->name('tcgPack.save-create');
Route::post('/tcgpacks/save-update', 'App\Http\Controllers\TCGPackController@saveUpdate')->name('tcgPack.save-update');
Route::get('/tcgpacks/{id}', 'App\Http\Controllers\TCGPackController@show')->name('tcgPack.show');
Route::delete('/tcgpacks/{id}', 'App\Http\Controllers\TCGPackController@delete')->name('tcgPack.delete');

/**
 * Order routes
 */
Route::get('/orders', 'App\Http\Controllers\OrderController@index')->name('order.index');
Route::get('/orders/create', 'App\Http\Controllers\OrderController@create')->name('order.create');
Route::get('/orders/update/{id}', 'App\Http\Controllers\OrderController@update')->name('order.update');
Route::get('/orders/{id}', 'App\Http\Controllers\OrderController@show')->name('order.show');
Route::post('/orders/create', 'App\Http\Controllers\OrderController@saveCreate')->name('order.save-create');
Route::put('/orders/{id}', 'App\Http\Controllers\OrderController@saveUpdate')->name('order.save-update');
Route::delete('/orders/{id}', 'App\Http\Controllers\OrderController@delete')->name('order.delete');

/**
 * Item routes
 */
Route::get('/items', 'App\Http\Controllers\ItemController@index')->name('item.index');
Route::get('/items/create', 'App\Http\Controllers\ItemController@create')->name('item.create');
Route::post('/items', 'App\Http\Controllers\ItemController@save')->name('item.save');
Route::delete('/items/{id}', 'App\Http\Controllers\ItemController@delete')->name('item.delete');
Route::get('/items/{id}', 'App\Http\Controllers\ItemController@show')->name('item.show');

/**
 * WishList routes
 */
Route::get('/wishLists', 'App\Http\Controllers\WishListsController@index')->name('wishList.index');
Route::get('/wishLists/create', 'App\Http\Controllers\WishListsController@create')->name('wishList.create');
Route::post('/wishLists', 'App\Http\Controllers\WishListsController@save')->name('wishList.save');
Route::delete('/wishLists/{id}', 'App\Http\Controllers\WishListsController@delete')->name('wishList.delete');
Route::get('/wishLists/{id}', 'App\Http\Controllers\WishListsController@show')->name('wishList.show');

Auth::routes();
