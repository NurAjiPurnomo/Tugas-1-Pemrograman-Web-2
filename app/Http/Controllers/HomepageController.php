<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class HomepageController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        $title = 'Homepage';
        return view('web.homepage', ['categories' => $categories, 'title' => $title]);
    }

    public function products()
    {
        $title = 'Products';
        return view('web.products', ['title' => $title]);
    }

    public function product($slug)
    {
        $title = 'Product Details';
        return view('web.product', ['slug' => $slug, 'title' => $title]);
    }

    public function categories()
    {
        $title = 'Categories';
        return view('web.categories', ['title' => $title]);
    }

    public function category($slug)
    {
        $title = 'Category: ' . ucfirst($slug);
        return view('web.category_by_slug', ['slug' => $slug, 'title' => $title]);
    }

    public function cart()
    {
        $title = 'Your Cart';
        return view('web.cart', ['title' => $title]);
    }

    public function checkout()
    {
        $title = 'Checkout';
        return view('web.checkout', ['title' => $title]);
    }
}
