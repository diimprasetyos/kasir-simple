<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public function index(): View
    {
        //get all products
        $products = Product::latest()->paginate(5);

        //render view with products
        return view('products.index', compact('products'));
    }

    public function create(): View
    {
        return view('products.create');
    }

    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            // 'image'         => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title'         => 'required|min:5',
            // 'description'   => 'required|min:10',
            'sell_price'         => 'required|numeric',
            'cost_price'         => 'required|numeric',
            'stock'         => 'required|numeric'
        ]);

        //upload image
        // $image = $request->file('image');
        // $image->storeAs('public/products', $image->hashName());

        //create product
        Product::create([
            // 'image'         => $image->hashName(),
            'title'         => $request->title,
            // 'description'   => $request->description,
            'sell_price'         => $request->sell_price,
            'cost_price'         => $request->cost_price,
            'stock'         => $request->stock
        ]);

        //redirect to index
        return redirect()->route('products.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $id): View
    {
        //get product by ID
        $product = Product::findOrFail($id);

        //render view with product
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            // 'image'         => 'image|mimes:jpeg,jpg,png|max:2048',
            'title'         => 'required|min:5',
            // 'description'   => 'required|min:10',
            'sell_price'         => 'required|numeric',
            'cost_price'         => 'required|numeric',
            'stock'         => 'required|numeric'
        ]);

        //get product by ID
        $product = Product::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/products', $image->hashName());

            //delete old image
            // Storage::delete('public/products/'.$product->image);

            //update product with new image
            $product->update([
                'image'         => $image->hashName(),
                'title'         => $request->title,
                // 'description'   => $request->description,
                'cost_price'=> $request->cost_price,
                'sell_price'=> $request->sell_price,
                'stock'         => $request->stock
            ]);
        } else {

            //update product without image
            $product->update([
                'title'         => $request->title,
                // 'description'   => $request->description,
                'price'         => $request->price,
                'cost_price'=> $request->cost_price,
                'sell_price'=> $request->sell_price,
                'stock'         => $request->stock
            ]);
        }

        //redirect to index
        return redirect()->route('products.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function show(string $id): View
    {
        //get product by ID
        $product = Product::findOrFail($id);

        //render view with product
        return view('products.show', compact('product'));
    }

    public function destroy($id): RedirectResponse
    {
        //get product by ID
        $product = Product::findOrFail($id);

        //delete image
        // Storage::delete('public/products/'. $product->image);

        //delete product
        $product->delete();

        //redirect to index
        return redirect()->route('products.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function search(Request $request)
    {
        // Ambil data pencarian dari request
        $cari = $request->cari;

        // Lakukan pencarian berdasarkan judul produk
        $products = Product::where('title', 'like', "%".$cari."%")->paginate();

        // Kembalikan view index dengan data hasil pencarian
        return view('products.index', compact('products', 'cari'));
    }
}
