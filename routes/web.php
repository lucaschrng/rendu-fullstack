<?php

use App\Http\Controllers\ApiKeyController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\TrackController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;

Route::get('/', [TrackController::class, 'index'])->name('tracks.index');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::resource('playlists', PlaylistController::class)->only(['index', 'create', 'store', 'show']);
    Route::resource('api-keys', ApiKeyController::class)->only(['index', 'create', 'store', 'destroy']);

    Route::controller(TrackController::class)
        ->prefix('tracks')
        ->name('tracks.')
        ->middleware([Admin::class])
        ->group(function () {
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{track}', 'show')->name('show');
            Route::get('/{track}/edit', 'edit')->name('edit');
            Route::put('/{track}', 'update')->name('update');
            Route::delete('/{track}', 'destroy')->name('destroy');
        });
});
