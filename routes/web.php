<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\firstBike;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::group(['middleware' => ['auth', 'verified']], function () {
   Route::view('dashboard', 'dashboard')->name('dashboard');
   Route::view('components', 'components')->name('components');

   Route::redirect('bike', 'bike/overview')->name('bike');
   Volt::route('bike/overview', 'bike.overview')->middleware(firstBike::class)->name('bike.overview');
   Volt::route('bike/appearance', 'bike.appearance')->name('bike.appearance');
   Volt::route('bike/create', 'bike.create')->name('bike.create');

});

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
