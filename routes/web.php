<?php

use App\Http\Controllers\InventoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [InventoryController::class, 'index'])->name('item.home');
Route::get('/add-item', [InventoryController::class, 'addItem'])->name('item.add');
Route::post('/store-item', [InventoryController::class, 'storeItem'])->name('item.store');
Route::get('/edit-item/{id}', [InventoryController::class, 'editItem'])->name('item.edit');
Route::put('/update-item', [InventoryController::class, 'updateItem'])->name('item.update');
Route::delete('/delete-item/{id}', [InventoryController::class, 'deleteItem'])->name('item.delete');
