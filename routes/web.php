<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    $title = 'Homepage';
    return view('web.homepage',['title'=>$title ] );
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('products', function(){
    $title = 'Produts';
    return view('web.products' , ['title'=>$title]);
});
    
Route::get('categories-pria', function(){
    $title = 'Categories Pria';
    return view('web.categories-pria', ['title'=>$title]);
});

Route::get('categories-wanita', function(){
    $title = 'Categories Wanita';
    return view('web.categories-wanita', ['title'=>$title]);
});

Route::get('categories-kids', function(){
    $title = 'Categories Kids';
    return view('web.categories-kids', ['title'=>$title]);
});

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
