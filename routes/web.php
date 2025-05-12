<?php

use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProductCategoryController;

Route::get('/', [HomepageController::class, 'index'])->name('home');
Route::get('/products', [HomepageController::class, 'products'])->name('products');

// Volt::route('products', 'products')->name('products');

Route::get('/categories', function() { 
    return "halaman categories product"; 
});


Route::view('dashboard', 'dashboard')
->middleware(['auth', 'verified'])
->name('dashboard');


Route::resource('categories', ProductCategoryController::class);

    
Route::view('dashboard', 'dashboard')
->middleware(['auth', 'verified'])
->name('dashboard');

Route::middleware(['auth'])->group(function () {
Route::redirect('settings', 'settings/profile');

Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
Volt::route('settings/password', 'settings.password')->name('settings.password');
Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';


// // Halaman Detail Produk dengan ID
// Route::get('/products/{id}', function ($id) {
//     return "halaman single product - " ;
//     "<body style='background-color: ashgrey; margin: 0; padding: 20px; text-align: center;'>
//                 <h2 style='color: darkgray;'>🔍 Detail Produk ID: $id</h2>
//             // </body>";
// });

// // Halaman Keranjang Belanja
// Route::get('/cart', function () {
//     return "<body style='background-color: ashgrey; margin:w 0; padding: 20px; text-align: center;'>
//                 <h2 style='color: darkgray;'>🛒 Keranjang Belanja Anda</h2>
//             </body>";
// });

// // Halaman Checkout
// Route::get('/checkout', function () {
//     return "<body style='background-color: ashgrey; margin: 0; padding: 20px; text-align: center;'>
//                 <h2 style='color: darkgray;'>💳 Checkout Pembelian</h2>
//             </body>";
// });

// // Halaman Tentang Kami
// Route::get('/about', function () {
//     return "<body style='background-color: ashgrey; margin: 0; padding: 20px; text-align: center;'>
//                 <h2 style='color: darkgray;'>ℹ️ Tentang Kami - Croacks.id</h2>
//             </body>";
// });

// // Halaman Kontak
// Route::get('/contact', function () {
//     return "<body style='background-color: ashgrey; margin: 0; padding: 20px; text-align: center;'>
//                 <h2 style='color: darkgray;'>📞 Hubungi Kami</h2>
//             </body>";
// });

// // Halaman Koleksi atau Kategori Produk
// Route::get('/categories', function () {
//     return "<body style='background-color: ashgrey; margin: 0; padding: 20px; text-align: center;'>
//                 <h2 style='color: darkgray;'>🗂 Kategori Produk</h2>
//             </body>";
// });

// // Halaman Detail Kategori Produk
// Route::get('/categories/{category}', function ($category) {
//     return "<body style='background-color: ashgrey; margin: 0; padding: 20px; text-align: center;'>
//                 <h2 style='color: darkgray;'>🗁 Kategori: $category</h2>
//             </body>";
// });

// // Halaman Marketplace
// Route::get('/marketplace', function () {
//     return "<body style='background-color: ashgrey; margin: 0; padding: 20px; text-align: center;'>
//                 <h2 style='color: darkgray;'>🛒 Marketplace Croacks.id</h2>
//             </body>";
// });

// // Halaman Pencarian
// Route::get('/search', function () {
//     return "<body style='background-color: ashgrey; margin: 0; padding: 20px; text-align: center;'>
//                 <h2 style='color: darkgray;'>🔎 Hasil Pencarian Produk</h2>
//             </body>";
// });

// // Halaman Promo
// Route::get('/promo', function () {
//     return "<body style='background-color: ashgrey; margin: 0; padding: 20px; text-align: center;'>
//                 <h2 style='color: darkgray;'>🎉 Promo dan Diskon Spesial</h2>
//             </body>";
// });

// // Halaman Blog / Berita
// Route::get('/blog', function () {
//     return "<body style='background-color: ashgrey; margin: 0; padding: 20px; text-align: center;'>
//                 <h2 style='color: darkgray;'>📰 Blog & Berita CROAKS.id</h2>
//             </body>";
// });
