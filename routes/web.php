<?php

use App\Http\Controllers\HomepageController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', [HomepageController::class, 'index']);
Route::get('produk', [HomepageController::class, 'produk']);  
Route::get('detail-product/{slug}', [HomepageController::class, 'detailProduct']);
Route::get('cart', [HomepageController::class, 'cart']);
Route::get('checkout', [HomepageController::class, 'checkout']);
Route::get('categories-male', [HomepageController::class, 'categoriesMale']);  
Route::get('categories-female', [HomepageController::class, 'categoriesFemale']);  
Route::get('categories-kids', [HomepageController::class, 'categoriesKids']);  

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');
    
// Route::middleware(['auth'])->group(function () {
//     Route::redirect('settings', 'settings/profile');

//     Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
//     Volt::route('settings/password', 'settings.password')->name('settings.password');
//     Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
// });

require __DIR__.'/auth.php';
