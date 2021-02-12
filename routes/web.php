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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::post('order/create', [App\Http\Controllers\Order\RegisterOrderController::class, 'register'])->name('order.create');
Route::get('order/myOrders', [App\Http\Controllers\orderController::class, 'myOrders'])->middleware('auth')->name('order.getMyOrders');
Route::get('order/success', [App\Http\Controllers\Order\RegisterOrderController::class, 'success']);
Route::get('order', [\App\Http\Controllers\orderController::class, 'index'])->middleware('auth')->name('order');
Route::delete('order/{id}', [\App\Http\Controllers\orderController::class, 'destroy'])->middleware('auth')->middleware('checkUser')->name('order.delete');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('users', \App\Http\Controllers\userController::class)->middleware('admin');
//Route::resource('order', \App\Http\Controllers\orderController::class);

