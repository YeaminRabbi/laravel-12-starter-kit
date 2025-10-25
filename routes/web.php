<?php

use App\Livewire\HomeLivewire;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('/', HomeLivewire::class)->name('home');

Route::get('/foo', function () {
    rescue(fn () => Artisan::call('storage:link'), null, report: false);

    return to_route('home');
});
