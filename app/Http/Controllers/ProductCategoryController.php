<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Storage;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::all();
        return view('dashboard.categories.index', [
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        return view('dashboard.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:product_categories,slug',
            'description' => 'nullable',
            'image' => 'nullable|image|max:2048',  // Validasi gambar
        ]);

        // Ambil data dari request (kecuali gambar)
        $data = $request->only('name', 'slug', 'description');

        // Cek apakah ada gambar yang di-upload
        if ($request->hasFile('image')) {
            // Simpan gambar baru dan masukkan path-nya ke dalam data
            $data['image'] = $request->file('image')->store('categories', 'public');
        }

        // Simpan kategori baru ke database
        ProductCategory::create($data);

        // Redirect dengan pesan sukses
        return redirect()->route('categories.index')->with('successMessage', 'Category added successfully!');
    }

    public function edit(ProductCategory $category)
    {
        // Menampilkan halaman edit kategori dengan data kategori yang dipilih
        return view('dashboard.categories.edit', compact('category'));
    }

    public function update(Request $request, ProductCategory $category)
    {
        // Validasi input data
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:product_categories,slug,' . $category->id, // Exclude current category slug
            'description' => 'nullable',
            'image' => 'nullable|image|max:2048',  // Validasi gambar
        ]);

        // Ambil data dari request (kecuali gambar)
        $data = $request->only('name', 'slug', 'description');

        // Cek jika ada gambar baru yang di-upload
        if ($request->hasFile('image')) {
            // Jika kategori sebelumnya punya gambar, kita hapus gambar lama terlebih dahulu
            if ($category->image) {
                Storage::delete('public/' . $category->image);  // Menghapus gambar lama
            }

            // Simpan gambar baru dan masukkan path-nya ke dalam data
            $data['image'] = $request->file('image')->store('categories', 'public');
        }

        // Update data kategori di database
        $category->update($data);

        // Redirect dengan pesan sukses
        return redirect()->route('categories.index')->with('successMessage', 'Category updated successfully!');
    }

    public function destroy(ProductCategory $category)
    {
        // Hapus gambar terkait jika ada
        if ($category->image) {
            Storage::delete('public/' . $category->image); // Menghapus gambar jika ada
        }

        // Hapus kategori dari database
        $category->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('categories.index')->with('successMessage', 'Category deleted successfully!');
    }
}