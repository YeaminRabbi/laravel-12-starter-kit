<?php

use App\Livewire\HomeLivewire;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeLivewire::class)->name('home');