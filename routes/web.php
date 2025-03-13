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
Route::get('/tcgcards/{id}', 'App\Http\Controllers\TCGCardController@show')->name('tcgCard.show');

/**
 * TCGPacks routes
 */
Route::get('/tcgpacks', 'App\Http\Controllers\TCGPackController@index')->name('tcgPack.index');
Route::get('/tcgpacks/{id}', 'App\Http\Controllers\TCGPackController@show')->name('tcgPack.show');

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

/**
 * Admin routes
 */
Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name('admin.index');

Route::get('/admin/tcgcards', 'App\Http\Controllers\Admin\AdminTCGCardController@index')->name('admin.tcgCard.index');
Route::get('/admin/tcgcards/create', 'App\Http\Controllers\Admin\AdminTCGCardController@create')->name('admin.tcgCard.create');
Route::get('/admin/tcgcards/update/{id}', 'App\Http\Controllers\Admin\AdminTCGCardController@update')->name('admin.tcgCard.update');
Route::post('/admin/tcgcards/save-create', 'App\Http\Controllers\Admin\AdminTCGCardController@saveCreate')->name('admin.tcgCard.save-create');
Route::put('/admin/tcgcards/{id}', 'App\Http\Controllers\Admin\AdminTCGCardController@saveUpdate')->name('admin.tcgCard.save-update');
Route::delete('/admin/tcgcards/{id}', 'App\Http\Controllers\Admin\AdminTCGCardController@delete')->name('admin.tcgCard.delete');

Route::get('/admin/tcgpacks', 'App\Http\Controllers\Admin\AdminTCGPackController@index')->name('admin.tcgPack.index');
Route::get('/admin/tcgpacks/create', 'App\Http\Controllers\Admin\AdminTCGPackController@create')->name('admin.tcgPack.create');
Route::get('/admin/tcgpacks/update/{id}', 'App\Http\Controllers\Admin\AdminTCGPackController@update')->name('admin.tcgPack.update');
Route::post('/admin/tcgpacks/save-create', 'App\Http\Controllers\Admin\AdminTCGPackController@saveCreate')->name('admin.tcgPack.save-create');
Route::put('/admin/tcgpacks/{id}', 'App\Http\Controllers\Admin\AdminTCGPackController@saveUpdate')->name('admin.tcgPack.save-update');
Route::delete('/admin/tcgpacks/{id}', 'App\Http\Controllers\Admin\AdminTCGPackController@delete')->name('admin.tcgPack.delete');

Route::get('/admin/items', 'App\Http\Controllers\Admin\AdminItemController@index')->name('admin.item.index');
Route::get('/admin/orders', 'App\Http\Controllers\Admin\AdminOrderController@index')->name('admin.order.index');
Route::get('/admin/wishLists', 'App\Http\Controllers\Admin\AdminWishListController@index')->name('admin.wishList.index');
Route::get('/admin/users', 'App\Http\Controllers\Admin\AdminUserController@index')->name('admin.user.index');

Auth::routes();
