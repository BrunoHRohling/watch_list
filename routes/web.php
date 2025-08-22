<?php

use App\Http\Controllers\ItemsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('items.index');
});

Route::get('/items', [ItemsController::class, 'index'])->name('items.index');

Route::view('/items/create', 'create')->name('items.create');

Route::get('/items/{item}', [ItemsController::class, 'show'])->name('items.show');

Route::post('/items', [ItemsController::class, 'store'])->name('items.store');

Route::get('items/{item}/edit', [ItemsController::class, 'edit'])->name('items.edit');

Route::put('items/{item}', [ItemsController::class, 'update'])->name('items.update');

Route::delete('items/{item}', [ItemsController::class, 'delete'])->name('items.destroy');

Route::patch('items/{item}/status', [ItemsController::class, 'status'])->name('items.status');

