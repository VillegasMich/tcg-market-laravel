<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware('setLocale')->group(function () {
    /**
     * Home routes
     */
    Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');
    Route::get('/language/{locale}', 'App\Http\Controllers\HomeController@switchLanguage')->name('language.switch');

    /**
     * Cart routes
     */
    Route::get('/cart', 'App\Http\Controllers\CartController@index')->name('cart.index');
    Route::post('/cart/remove-all', 'App\Http\Controllers\CartController@removeAll')->name('cart.remove-all');

    /**
     * TCGCards routes
     */
    Route::get('/tcgcards', 'App\Http\Controllers\TCGCardController@index')->name('tcgCard.index');
    Route::get('/tcgcards/{id}', 'App\Http\Controllers\TCGCardController@show')->name('tcgCard.show');
    Route::post('/cart/add/{id}', 'App\Http\Controllers\TCGCardController@addToCart')->name('tcgCard.add-to-cart');
    Route::post('/wishList/add/{id}', 'App\Http\Controllers\TCGCardController@addToWishList')->name('tcgCard.add-to-wishList');
    Route::delete('/wishList/remove/{id}', 'App\Http\Controllers\TCGCardController@removeFromWishList')->name('tcgCard.remove-from-wishList');

    /**
     * TCGPacks routes
     */
    Route::get('/tcgpacks', 'App\Http\Controllers\TCGPackController@index')->name('tcgPack.index');
    Route::get('/tcgpacks/{id}', 'App\Http\Controllers\TCGPackController@show')->name('tcgPack.show');

    Route::middleware('auth')->group(function () {
        /**
         * User routes
         */
        Route::get('/user', 'App\Http\Controllers\UserController@index')->name('user.index');

        /**
         * Order routes
         */
        Route::get('/orders', 'App\Http\Controllers\OrderController@index')->name('order.index');
        Route::get('/orders/create', 'App\Http\Controllers\OrderController@create')->name('order.create');
        Route::get('/orders/update/{id}', 'App\Http\Controllers\OrderController@update')->name('order.update');
        Route::get('/orders/{id}', 'App\Http\Controllers\OrderController@show')->name('order.show');
        Route::post('/orders/create', 'App\Http\Controllers\OrderController@saveCreate')->name('order.save-create');
        Route::put('/orders/pay/{id}', 'App\Http\Controllers\OrderController@pay')->name('order.pay');
        Route::put('/orders/{id}', 'App\Http\Controllers\OrderController@saveUpdate')->name('order.save-update');
        Route::delete('/orders/cancel/{id}', 'App\Http\Controllers\OrderController@delete')->name('order.delete');
        /**
         * WishList routes
         */
        Route::get('/wishLists', 'App\Http\Controllers\WishListController@index')->name('wishList.index');
        Route::get('/wishLists/create', 'App\Http\Controllers\WishListController@create')->name('wishList.create');
        Route::post('/wishLists', 'App\Http\Controllers\WishListController@save')->name('wishList.save');
        Route::delete('/wishLists/{id}', 'App\Http\Controllers\WishListController@delete')->name('wishList.delete');
        Route::get('/wishLists/{id}', 'App\Http\Controllers\WishListController@show')->name('wishList.show');
    });

    /**
     * Admin routes
     */
    Route::middleware('admin')->group(function () {
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
    });

    Auth::routes();
});
