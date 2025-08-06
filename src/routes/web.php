<?php

use App\Http\Middleware\RedirectIfAuthenticated;
use App\Livewire\Products\Create;
use App\Livewire\Products\Detail;
use App\Livewire\Products\Index;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
})->middleware('denyUsers')->name('login');

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('login');
})->name('logout');

Route::get('/exlibris', function () {
    return view('layouts.dashboard');
})->name('libris');


Route::prefix('dashboard')
    ->middleware(['role:GERENTE'])
    ->group(function () {
        Route::get('/', function () {
            return view('playground');
        })->name('dashboard');
        Route::prefix('products')->group(function () {
            Route::get('/', Index::class)->name('products.index');
            Route::get('/create', Create::class)->name('products.create');
            Route::get('/{id}', Detail::class)->name('products.detail');
        })->middleware(['role:GERENTE']);
    });
