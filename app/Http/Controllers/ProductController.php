<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Menampilkan daftar produk
    public function index()
    {
        $products = Product::with('category')->paginate(10);
        return view('dashboard.products.index', compact('products'));
    }

    // Menampilkan form untuk menambahkan produk baru
    public function create()
    {
        $categories = ProductCategory::all();
        return view('dashboard.products.create', compact('categories'));
    }

    // Menyimpan produk baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'product_category_id' => 'required|exists:product_categories,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image_url' => 'nullable|image|max:2048',
        ]);

        $slug = \Str::slug($request->name);
        $count = Product::where('slug', 'LIKE', "{$slug}%")->count();
        if ($count > 0) {
            $slug = $slug . '-' . ($count + 1);
        }

        $sku = strtoupper(substr(preg_replace('/[^A-Za-z0-9]/', '', $request->name), 0, 3)) . '-' . strtoupper(uniqid());

        $product = Product::create([
            'name' => $request->name,
            'slug' => $slug,
            'sku' => $sku,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'product_category_id' => $request->product_category_id,
            'image_url' => $request->hasFile('image_url') ? $request->file('image_url')->store('products', 'public') : null,
            'is_active' => true,
        ]);

        return redirect()->route('products.index')->with('successMessage', 'Product added successfully!');
    }

    // Menampilkan form untuk mengedit produk
    public function edit(Product $product)
    {
        $categories = ProductCategory::all();
        return view('dashboard.products.edit', compact('product', 'categories'));
    }

    // Mengupdate produk
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:products,slug,' . $product->id,
            'product_category_id' => 'required|exists:product_categories,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image_url' => 'nullable|image|max:2048',
        ]);

        $slug = $request->slug;
        if (empty($slug)) {
            $slug = \Str::slug($request->name);
            $count = Product::where('slug', 'LIKE', "{$slug}%")->where('id', '!=', $product->id)->count();
            if ($count > 0) {
                $slug = $slug . '-' . ($count + 1);
            }
        }

        $dataToUpdate = [
            'name' => $request->name,
            'slug' => $slug,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'product_category_id' => $request->product_category_id,
        ];

        if ($request->hasFile('image_url')) {
            $dataToUpdate['image_url'] = $request->file('image_url')->store('products', 'public');
        }

        $product->update($dataToUpdate);

        return redirect()->route('products.index')->with('successMessage', 'Product updated successfully!');
    }

    // Menghapus produk
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('successMessage', 'Product deleted successfully!');
    }
}
