<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'IndexController@index')->name('home');
Route::get('/logout', 'IndexController@logout') ;
Route::post('/orders/create', 'OrderController@createNoAuth') ;
Auth::routes();

    Route::get('orders','OrderController@orders')->middleware('expert')->name('orders');
    Route::get('orders/{id}','OrderController@order_view')->middleware('expert')->name('orders.view');
    Route::get('works','WorksController@works')->name('works');;
    Route::get('works/{id}','WorksController@view')->name('works.view');;
    Route::post('pay/addmoney','PayController@addmoney')->name('pay.addmoney');;
Route::middleware(['auth' ])->prefix('home')->group( function () {
    Route::get('works/bayed','WorksController@bayed_list')->name('works.bayed_list');
    Route::get('works/bayed/{id}','WorksController@bayed_view')->name('works.bayed_view');;
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('orders',OrderController::class);
    Route::resource('works',WorksController::class);


}) ;


